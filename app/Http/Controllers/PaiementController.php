<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Panier;
use CinetPay\CinetPay;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\ProduitCommande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\PaiementRequest;
use App\Mail\Shopmetics;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class PaiementController extends Controller
{
    // Preparation des elements constituant le panier
    private $apiKey = "208399534962592c3add2e16.66241584"; //Veuillez entrer votre apiKey
    private $site_id = "305123"; //Veuillez entrer votre siteId
    private $secret_key = '1871290163625b682a939e90.60474185'; //Veuillez entrer votre secretKey
    protected $currency = 'XOF'; // Montant à Payer : minimum est de 100 francs sur CinetPay
    protected $notify_url = ''; // Lien de notification CallBack CinetPay (IPN Link)
    protected $return_url = ''; // Lien de retour CallBack CinetPay
    protected $cancel_url = ''; // Lien d'annulation CinetPay
    // Constructeur
    public function __construct()
    {
        $this->return_url = route('payment.result');
        $this->cancel_url = route('payment.result');
    }
    // Return to specified view after payment
    public function returnUrl()
    {
        $transaction = json_decode($_COOKIE['paymentResult'], true);
        // dd($transaction);

        if ($transaction['status'] == 'REFUSED') { // Échec de la transaction...
            if (isset($response['cpm_error_message']) && $response['cpm_error_message'] == 'INSUFFICIENT_BALANCE')
                $paymentMsg = "La paiement a échoué en raison d'un solde insuffisant sur votre compte";
            else
                $paymentMsg = "La transaction a échouée";
        } else if ($transaction['status'] == 'ACCEPTED') { // Succès de la transaction...
            $paymentMsg = "Le paiement de votre commande d'un montant de " . $transaction['amount'] . " " . $transaction['currency'] . " a été effectué avec succès. Merci pour votre confiance";

            $commande = new Commande();
            $commande->code_cmd =  uniqid();
            $commande->date_cmd = $date = date('d-m-y h:i:s');
            $commande->statut_cmd = "Validé";
            $commande->id_client = Auth::id();
            $commande->id_moyen_paiement = 1;
            $commande->save();

            $cart = Panier::where('id_user', Auth::id())->get();
            foreach ($cart as $monproduit) {
                $produit_cmd = new ProduitCommande();
                $produit_cmd->id_prod = $monproduit->id_prod;
                $produit_cmd->id_cmd = $commande->id;
                $produit_cmd->qte_cmd = $monproduit->qt_prod;
                $produit_cmd->prix_prod_actuel = $monproduit->produits->prix_prod;
                $produit_cmd->save();
            }
            // Informer le client que la commande est validée par mail
            try {
                $client = Auth::user();
                Mail::to($client)->send(new Shopmetics($client, []));
            } catch (Exception $exc) {
                return response()->json([
                    'success' => false,
                    'message' => "Erreur lors de l'envoi du mail de confirmation de commande",
                    'error' => $exc->getMessage(),
                ], 400);
            }
        } else {
            $paymentMsg = "Une erreur est survenue suite au paiement de votre commande";
        }
        // On redirige l'utilisateur sur la page du résultat de la commande
        return view('checkout-result', [
            'status' => $transaction['status'],
            'paymentMsg' => $paymentMsg,
            'paymentMethod' => $transaction['payment_method'] ?? '',
            'amount' => $transaction['amount'] ?? 0,
            'currency' => $transaction['currency'] ?? 'XOF',
        ]);
    }

    // Appel de l'API de CinetPay
    public function payment(Request $request)
    {
        $commande = $request->all();
        // Création de la commande
        $response = Http::withHeaders([
            'Content-type' => 'application/json',
            'X-CSRF-TOKEN' => csrf_token(),
        ])->post('https://api-checkout.cinetpay.com/v2/payment', [
            'apikey' => $this->apiKey,
            'site_id' => $this->site_id,
            'transaction_id' => 'commande-du-' . date('Y-m-d-H:i:s'),
            'amount' => $commande['montant_total'] ?? 100,
            'currency' => $this->currency,
            'description' => "Commande du " . now() . " pour " . $commande['nom'] . " " . $commande['prenom'] . " d'un montant de " . $commande['montant_total'] . " " . $this->currency,
            'notify_url' => '',
            'return_url' => $this->return_url,
            'channels' => 'ALL',
            'lang' => 'fr',
            // Activer l'univers de paiement par carte bancaire
            'customer_name' => $commande['nom'],
            'customer_surname' => $commande['prenom'],
            'customer_phone_number' => $commande['telephone'] ?? '',
            'customer_email' => $commande['email'] ?? '',
            'customer_address' => $commande['adresse'] ?? '',
            'customer_city' => $commande['ville'],
            'customer_country' => 'CI',
            'customer_state' => $commande['adresse'] ?? '',
            'customer_zip_code' => $commande['code_postal'] ?? '',
            'metadata' => "_token=" . csrf_token(),
        ]);
        // redirection
        // dd($response);
        return redirect($response['data']['payment_url']);
    }

    // Générer un token
    public function generateToken()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://client.cinetpay.com/v1/auth/login', [
            'form_params' => [
                'apikey' => $this->apiKey,
                'password' => "Hash::make('xcoders22');",
            ]
        ]);
        $response = json_decode($response->getBody());
        // Retourner le token
        return $response->data->token;
    }

    // Consulter le solde de votre compte
    public function balance()
    {
        $token = $this->generateToken();
        // dd($token);
        $response = Http::withHeaders([
            'Content-type' => 'application/json',
            'X-CSRF-TOKEN' => csrf_token(),
        ])->get('https://client.cinetpay.com/v1/transfer/check/balance', [
            'token' => $token,
            'lang' => 'fr',
        ]);
        $response = json_decode($response->getBody());
        // Retourner le solde
        return $response;
    }
}
