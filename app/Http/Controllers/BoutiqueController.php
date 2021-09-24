<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
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
        $produits = Produit::where('deleted_at', null)->get();
        // Récupération des categories
        $categories = Categorie::where('deleted_at', null)->get();
        // Appel de la vue en passant les données
        return view(
            'boutique',
            [
                'produits' => $produits,
                'categories' => $categories,
            ]
        );
    }
}
