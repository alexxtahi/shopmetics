<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CinetPay\CinetPay;
use Exception;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    // Preparation des elements constituant le panier
    private $apiKey = "208399534962592c3add2e16.66241584"; //Veuillez entrer votre apiKey
    private $site_id = "305123"; //Veuillez entrer votre siteId
    private $secret_key = '1871290163625b682a939e90.60474185'; //Veuillez entrer votre secretKey
    protected $devise = 'XOF'; // Montant à Payer : minimum est de 100 francs sur CinetPay
    protected $formName = "goCinetPay"; // nom du formulaire CinetPay
    protected $notify_url = ''; // Lien de notification CallBack CinetPay (IPN Link)
    protected $return_url = ''; // Lien de retour CallBack CinetPay
    protected $cancel_url = ''; // Lien d'annulation CinetPay
    // Configuration du bouton
    protected $btnType = 5; // 1-5
    protected $btnSize = 'larger'; // 'small' pour réduire la taille du bouton, 'large' pour une taille moyenne ou 'larger' pour  une taille plus grande
    // Constructeur
    public function __construct()
    {
        $this->return_url = route('cinetpay.return');
        $this->cancel_url = route('cinetpay.return');
    }
    // Return to specified view after payment
    public function returnUrl(Request $request)
    {
        // request scanning
        // dd($request);
        // Checking CinetPay Response
        $response = $request->all();
        $paymentMsg = '';
        if ($response['cpm_trans_status'] == 'REFUSED') { // Échec de la transaction...
            if ($response['cpm_error_message'] == 'INSUFFICIENT_BALANCE')
                $paymentMsg = "La paiement a échoué en raison d'un solde insuffisant sur votre compte";
            else
                $paymentMsg = "La transaction a échouée";
        } else if ($response['cpm_trans_status'] == 'ACCEPTED') { // Succès de la transaction
            $paymentMsg = "Le paiement a été effectué avec succès !";
        }
        // Return view with message
        // On redirige l'utilisateur sur la page du panier
        $ctrler = new BoutiqueController;
        return $ctrler->showCart([
            'status' => $response['cpm_trans_status'],
            'paymentMsg' => $paymentMsg
        ]);
    }

    // Generate checkout form datas
    public function paymentForm(int $amount = 100)
    {
        // Préparation des éléments du formulaire
        $id_transaction = CinetPay::generateTransId(); // Identifiant du Paiement
        $identifiant_du_payeur = Auth::user()->email; // Mettez ici une information qui vous permettra d'identifier de façon unique le payeur
        $description_du_paiement = 'Transaction n°' . $id_transaction; // Description du Payment
        $date_transaction = date("Y-m-d H:i:s"); // Date Paiement dans votre système
        $montant_a_payer = $amount; // Montant à Payer : minimum est de 100 francs sur CinetPay

        // Paramétrage du panier CinetPay et affichage du formulaire
        $cinetpay = new CinetPay($this->site_id, $this->apiKey);
        $cinetpay->setTransId($id_transaction)
            ->setDesignation($description_du_paiement)
            ->setTransDate($date_transaction)
            ->setAmount($montant_a_payer)
            ->setCurrency($this->devise)
            ->setDebug(true) // Valorisé à true, si vous voulez activer le mode debug sur cinetpay afin d'afficher toutes les variables envoyées chez CinetPay
            ->setCustom($identifiant_du_payeur) // optional
            ->setNotifyUrl($this->notify_url) // optional
            ->setReturnUrl($this->return_url) // optional
            ->setCancelUrl($this->cancel_url) // optional
            ->getPayButton($this->formName, $this->btnType, $this->btnSize);
        // On récupère les données du formulaire
        return [
            // 'btn' => $this->generateCheckoutLink(),
            'name' => $this->formName,
            'action' => $cinetpay->_cashDeskUri,
            'fields' => $cinetpay->generateFormFields(),
        ];
    }
}
