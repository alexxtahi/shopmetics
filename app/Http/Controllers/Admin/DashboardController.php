<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\PaymentHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PaiementController;
use App\Models\Besoin;
use App\Models\Commande;
use App\Models\Commentaire;
use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\ProduitCommande;
use App\Models\ProduitPromotion;

class DashboardController extends Controller
{
    /**
     * Affiche l'accueil du tableau de bord
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupération des produits
        $produits = Produit::where('deleted_at', null)->get();
        // Récupération des commandes
        $commandes = Commande::join('clients', 'clients.id', '=', 'commandes.id_client')
            ->join('users', 'users.id', '=', 'clients.id_user')
            ->select('commandes.*', 'users.nom as nom_client', 'users.prenom as prenom_client')
            ->get();
        // Récupération des produits commandes
        $total_cmd_cash = 0;
        $total_prod_ventes = 0;
        $produitCommande = ProduitCommande::where('deleted_at', null)->get();
        foreach ($produitCommande as $prod_cmd) {
            $total_cmd_cash += $prod_cmd->qte_cmd * $prod_cmd->prix_prod_actuel;
            $total_prod_ventes += $prod_cmd->qte_cmd;
        }
        // Récupération des besoins
        $besoins = Besoin::where('deleted_at', null)->get();
        // Solde
        $cinetpay_wallet = PaymentHelper::getBalance();
        // Récupération des stats
        $total_prod_promotions = ProduitPromotion::where('deleted_at', null)->count();
        $total_carts = Panier::where('deleted_at', null)->get()->groupBy('id_user')->count();
        $comments = Commentaire::where('deleted_at', null)->count();
        // Résultat de la précédente opération
        $result = session()->get('result') ?? null;
        // Appel de la vue
        return view(
            'admin.index',
            compact(
                'produits',
                'commandes',
                'produitCommande',
                'total_cmd_cash',
                'total_prod_ventes',
                'besoins',
                'cinetpay_wallet',
                'total_prod_promotions',
                'total_carts',
                'comments',
                'result'
            )
        );
    }
}
