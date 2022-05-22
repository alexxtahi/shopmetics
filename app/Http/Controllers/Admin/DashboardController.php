<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Besoin;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\ProduitCommande;

class DashboardController extends Controller
{
    /**
     * Affiche l'accueil du tableau de bord
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*********************************Commandes******************************************/ 
        // Récupération des commandes
        $commandes = Commande::where('deleted_at', null)
            ->get();
        
        // Récupération des commandes validé
        $commandesValidé = Commande::where('statut_cmd', 'validé')
            ->get();
        
        // Récupération des commandes en cours
        $commandesEncours = Commande::where('statut_cmd', 'En cours')
            ->get();

        // Récupération des produits commandes
        $produitcommande = ProduitCommande::where('deleted_at', null)
        ->get();
 
        /***************************************************************************/ 

      
        // Récupération des produits
        $produits = Produit::where('deleted_at', null)
            ->get();
        $meilleursProduits = Produit::where('deleted_at', null)
            ->paginate(3); // Récupérer seulement 3 enregistrements
        $top5Produits = Produit::where('deleted_at', null)
            ->orderBy('prix_prod', 'DESC')
            ->paginate(5); // Récupérer seulement 3 enregistrements
        // Récupération des besoins
        $besoins = Besoin::where('deleted_at', null)
            ->get();
        // Appel de la vue
        return view('admin.index', 
                compact('produitcommande','commandes', 'produits', 
                        'meilleursProduits', 'top5Produits', 'besoins',
                        'commandesValidé', 'commandesEncours'));
    }
}
