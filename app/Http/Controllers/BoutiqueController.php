<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Promotion;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    /**
     * Affiche la page d'accueil
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupération des produits
        $produits = Produit::where('produits.deleted_at', null)
            ->join('categories', 'categories.id', '=', 'produits.id_cat') // Jointure avec les catégories
            ->select('produits.*', 'categories.lib_cat as lib_cat') // Choix de ce qu'on veut récupérer dans la requête
            ->get();
        // Récupération des categories
        $categories = Categorie::where('deleted_at', null)->get();
        // Récupération des promotions
        $promotions = Promotion::where('deleted_at', null)->get();
        // Appel de la vue en passant les données
        return view(
            'boutique',
            [
                'produits' => $produits,
                'categories' => $categories,
                'promotions' => $promotions,
            ]
        );
    }
}
