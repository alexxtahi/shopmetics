<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Promotion;
use App\Models\Tag;
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
        // Récupération des tags
        $tags = Tag::where('deleted_at', null)->get();
        // Récupération des promotions
        $promotions = Promotion::where('deleted_at', null)->get();
        // Appel de la vue en passant les données
        return view(
            'boutique',
            [
                'produits' => $produits,
                'categories' => $categories,
                'tags' => $tags,
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
        // Récupération de tous les résultats de la requête
        $data = $request->all();
        //dd($data);
        $priceFilterMin = $data['minamount'] = (int) str_replace('$', '', $data['minamount']);
        $priceFilterMax = $data['maxamount'] = (int) str_replace('$', '', $data['maxamount']);
        // Récupération des produits
        $produits = Produit::join('categories', 'categories.id', '=', 'produits.id_cat') // Jointure avec les catégories
            ->select('produits.*', 'categories.lib_cat as lib_cat') // Choix de ce qu'on veut récupérer dans la requête
            ->where([['produits.deleted_at', null], ['produits.prix_prod', '>=', $priceFilterMin], ['produits.prix_prod', '<=', $priceFilterMax]]) // Condition
            ->get();
        //dd($produits);
        // Récupération des categories
        $categories = Categorie::where('deleted_at', null)->get();
        // Récupération des tags
        $tags = Tag::where('deleted_at', null)->get();
        // Récupération des promotions
        $promotions = Promotion::where('deleted_at', null)->get();
        // Appel de la vue en passant les données
        return view(
            'boutique',
            [
                'produits' => $produits,
                'categories' => $categories,
                'tags' => $tags,
                'promotions' => $promotions,
                'priceFilterMin' => $priceFilterMin,
                'priceFilterMax' => $priceFilterMax,
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
        // Récupération de tous les résultats de la requête
        $data = $request->all();
        // Récupération des produits
        $produits = Produit::join('categories', 'categories.id', '=', 'produits.id_cat') // Jointure avec les catégories
            ->select('produits.*', 'categories.lib_cat as lib_cat') // Choix de ce qu'on veut récupérer dans la requête
            ->where([['produits.deleted_at', null], ['categories.id', $data['id_cat']]]) // Condition
            ->get();
        //dd($produits);
        // Récupération des categories
        $categories = Categorie::where('deleted_at', null)->get();
        // Récupération des tags
        $tags = Tag::where('deleted_at', null)->get();
        // Récupération des promotions
        $promotions = Promotion::where('deleted_at', null)->get();
        // Appel de la vue en passant les données
        return view(
            'boutique',
            [
                'produits' => $produits,
                'categories' => $categories,
                'tags' => $tags,
                'promotions' => $promotions,
                'selectedCategorie' => $data['id_cat'],
            ]
        );
    }
    /**
     * Charger les produits grâce au filtre de prix
     *
     * @return \Illuminate\Http\Response
     */
    public function filterProdByTags(Request $request)
    {
        //dd($request);
        // Récupération de tous les résultats de la requête
        $data = $request->all();
        // Récupération des produits
        $produits = Produit::join('categories', 'categories.id', '=', 'produits.id_cat') // Jointure avec les catégories
            ->select('produits.*', 'categories.lib_cat as lib_cat') // Choix de ce qu'on veut récupérer dans la requête
            ->where([['produits.deleted_at', null], ['produits.description', 'like', '%' . $data['tag'] . '%']]) // Condition
            ->get();
        //dd($produits);
        // Récupération des categories
        $categories = Categorie::where('deleted_at', null)->get();
        // Récupération des promotions
        $promotions = Promotion::where('deleted_at', null)->get();
        // Récupération des tags
        $tags = Tag::where('deleted_at', null)->get();
        // Appel de la vue en passant les données
        return view(
            'boutique',
            [
                'produits' => $produits,
                'categories' => $categories,
                'tags' => $tags,
                'promotions' => $promotions,
                'selectedTag' => $data['tag'],
            ]
        );
    }
}
