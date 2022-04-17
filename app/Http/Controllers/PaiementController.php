<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CinetPay\CinetPay;
use Exception;

class PaiementController extends Controller
{
    // Preparation des elements constituant le panier
    private $apiKey = "208399534962592c3add2e16.66241584"; //Veuillez entrer votre apiKey
    private $site_id = "305123"; //Veuillez entrer votre siteId
    private $secret_key = '1871290163625b682a939e90.60474185'; //Veuillez entrer votre secretKey
    protected $devise = 'XOF'; // Montant à Payer : minimun est de 100 francs sur CinetPay
    protected $identifiant_du_payeur = 'payeur@domaine.ci'; // Mettez ici une information qui vous permettra d'identifier de façon unique le payeur
    protected $formName = "goCinetPay"; // nom du formulaire CinetPay
    protected $notify_url = ''; // Lien de notification CallBack CinetPay (IPN Link)
    protected $return_url = ''; // Lien de retour CallBack CinetPay
    protected $cancel_url = ''; // Lien d'annulation CinetPay
    // Configuration du bouton
    protected $btnType = 2; //1-5xwxxw
    protected $btnSize = 'large'; // 'small' pour réduire la taille du bouton, 'large' pour une taille moyenne ou 'larger' pour  une taille plus grande
    // Generate a checkout link
    public function generateCheckoutLink()
    {
        try {
            // Préparation des éléments du formulaire
            $id_transaction = CinetPay::generateTransId(); // Identifiant du Paiement
            $description_du_paiement = 'Mon produit de ref ' . $id_transaction; // Description du Payment
            $date_transaction = date("Y-m-d H:i:s"); // Date Paiement dans votre système
            $montant_a_payer = 100; // Montant à Payer : minimum est de 100 francs sur CinetPay

            // Paramétrage du panier CinetPay et affichage du formulaire
            $cp = new CinetPay($this->site_id, $this->apiKey);
            $cp->setTransId($id_transaction)
                ->setDesignation($description_du_paiement)
                ->setTransDate($date_transaction)
                ->setAmount($montant_a_payer)
                ->setCurrency($this->devise)
                ->setDebug(true) // Valorisé à true, si vous voulez activer le mode debug sur cinetpay afin d'afficher toutes les variables envoyées chez CinetPay
                ->setCustom($this->identifiant_du_payeur) // optional
                ->setNotifyUrl($this->notify_url) // optional
                ->setReturnUrl($this->return_url) // optional
                ->setCancelUrl($this->cancel_url) // optional
                ->displayPayButton($this->formName, $this->btnType, $this->btnSize);
            // redirection vers le formulaire CinetPay
            // return $cp->getForm();
        } catch (Exception $exc) {
            print $exc->getMessage();
        }
    }
}
