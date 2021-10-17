<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Promotion;
use Illuminate\Http\Request;
include_once(app_path() . "/number-to-letters/nombre_en_lettre.php");

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
    /**
     * Charger les produits grâce au filtre de prix
     *
     * @return \Illuminate\Http\Response
     */
    public function filterProdByPrice(Request $request)
    {
        //dd($request);
        // ? Récupération de tous les résultats de la requête
        $data = $request->all();
        //dd($data);
        $data['minamount'] = (int) str_replace('$', '', $data['minamount']);
        $data['maxamount'] = (int) str_replace('$', '', $data['maxamount']);
        // ? Récupération des produits
        $produits = Produit::join('categories', 'categories.id', '=', 'produits.id_cat') // Jointure avec les catégories
            ->select('produits.*', 'categories.lib_cat as lib_cat') // Choix de ce qu'on veut récupérer dans la requête
            ->where([['produits.deleted_at', null], ['produits.prix_prod', '>=', $data['minamount']], ['produits.prix_prod', '<=', $data['maxamount']]])
            ->get();
        //dd($produits);
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
    /**
     * Charger les produits grâce au filtre de prix
     *
     * @return \Illuminate\Http\Response
     */
    public function filterProdByCategorie(Request $request)
    {
        //dd($request);
        // ? Récupération de tous les résultats de la requête
        $data = $request->all();
        // ? Récupération des produits
        $produits = Produit::join('categories', 'categories.id', '=', 'produits.id_cat') // Jointure avec les catégories
            ->select('produits.*', 'categories.lib_cat as lib_cat') // Choix de ce qu'on veut récupérer dans la requête
            ->where([['produits.deleted_at', null], ['categories.id', $data['categorie']]])
            ->get();
        //dd($produits);
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
