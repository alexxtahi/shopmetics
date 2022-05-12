<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil
     *
     * @return \Illuminate\Http\Response
     */
    public function index($previous_result = [])
    {
        // Récupération des produits
        $produits = Produit::join('categories', 'categories.id', '=', 'produits.id_cat')
            ->select('produits.*', 'categories.lib_cat as lib_cat')
            ->where('produits.deleted_at', null)
            ->get();
        $produits = Produit::where('deleted_at', null)
            ->get();
        // Appel de la vue
        return view('home', [
            'produits' => $produits,
            'previous_result' => $previous_result,
        ]);
    }
}
