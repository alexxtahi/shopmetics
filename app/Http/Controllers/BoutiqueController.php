<?php

namespace App\Http\Controllers;



//use Cart ;
use App\Models\Tag;
use App\Models\Cart;
use App\Models\User;
use App\Models\Panier;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $categories = Categorie::where('deleted_at', null)
            ->get();
        // Récupération des tags
        $tags = Tag::where('deleted_at', null)
            ->get();
        // Récupération des promotions
        $promotions = Promotion::where('deleted_at', null)
            ->get();
        // Récupération du nombre total de produit dans le panier
        if (Auth::check()) {
            $cart = Panier::where('id_user', Auth::id())
                ->get();
            $val = 0;
            foreach ($cart as $key) {
                $var = 1 * $key->qt_prod;
                $val = $val + $var;
            }

            $nombre_prod = $val;
        } else {
            $nombre_prod = 0;
        }
        // Appel de la vue en passant les données
        return view(
            'boutique',
            [
                'produits' => $produits,
                'categories' => $categories,
                'tags' => $tags,
                'promotions' => $promotions,
                'nombre_prod' => $nombre_prod,
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
        $categories = Categorie::where('deleted_at', null)
            ->get();
        // Récupération des tags
        $tags = Tag::where('deleted_at', null)
            ->get();
        // Récupération des promotions
        $promotions = Promotion::where('deleted_at', null)
            ->get();
        // Récupération du nombre total de produit dans le panier
        if (Auth::check()) {
            $cart = Panier::where('id_user', Auth::id())
                ->get();
            $val = 0;
            foreach ($cart as $key) {
                $var = 1 * $key->qt_prod;
                $val = $val + $var;
            }

            $nombre_prod = $val;
        } else {
            $nombre_prod = 0;
        }
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
                'nombre_prod' => $nombre_prod,
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
        $categories = Categorie::where('deleted_at', null)
            ->get();
        // Récupération des tags
        $tags = Tag::where('deleted_at', null)
            ->get();
        // Récupération des promotions
        $promotions = Promotion::where('deleted_at', null)
            ->get();
        // Récupération du nombre total de produit dans le panier
        if (Auth::check()) {
            $cart = Panier::where('id_user', Auth::id())
                ->get();
            $val = 0;
            foreach ($cart as $key) {
                $var = 1 * $key->qt_prod;
                $val = $val + $var;
            }

            $nombre_prod = $val;
        } else {
            $nombre_prod = 0;
        }
        // Appel de la vue en passant les données
        return view(
            'boutique',
            [
                'produits' => $produits,
                'categories' => $categories,
                'tags' => $tags,
                'promotions' => $promotions,
                'selectedCategorie' => $data['id_cat'],
                'nombre_prod' => $nombre_prod,
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
        $categories = Categorie::where('deleted_at', null)
            ->get();
        // Récupération des promotions
        $promotions = Promotion::where('deleted_at', null)
            ->get();
        // Récupération des tags
        $tags = Tag::where('deleted_at', null)
            ->get();
        // Récupération du nombre total de produit dans le panier
        if (Auth::check()) {
            $cart = Panier::where('id_user', Auth::id())
                ->get();
            $val = 0;
            foreach ($cart as $key) {
                $var = 1 * $key->qt_prod;
                $val = $val + $var;
            }

            $nombre_prod = $val;
        } else {
            $nombre_prod = 0;
        }
        // Appel de la vue en passant les données
        return view(
            'boutique',
            [
                'produits' => $produits,
                'categories' => $categories,
                'tags' => $tags,
                'promotions' => $promotions,
                'selectedTag' => $data['tag'],
                'nombre_prod' => $nombre_prod,
            ]
        );
    }

    public function searchProduct(Request $request)
    {

        // Récupération des produits
        $produits = Produit::where('produits.deleted_at', null)
            ->join('categories', 'categories.id', '=', 'produits.id_cat') // Jointure avec les catégories
            ->select('produits.*', 'categories.lib_cat as lib_cat') // Choix de ce qu'on veut récupérer dans la requête
            ->get();
        // Récupération des categories
        $categories = Categorie::where('deleted_at', null)
            ->get();
        // Récupération des tags
        $tags = Tag::where('deleted_at', null)
            ->get();
        // Récupération des promotions
        $promotions = Promotion::where('deleted_at', null)
            ->get();
        // Récuperation du produit saisie
        $input = $request->input('q');
        //Recherche du produit
        $produit = Produit::where('designation', $input)
            ->get();
        // Récupération du nombre total de produit dans le panier
        if (Auth::check()) {
            $cart = Panier::where('id_user', Auth::id())
                ->get();
            $val = 0;
            foreach ($cart as $key) {
                $var = 1 * $key->qt_prod;
                $val = $val + $var;
            }

            $nombre_prod = $val;
        } else {
            $nombre_prod = 0;
        }
        // Appel de la vue en passant les données
        return view('boutique', [
            'produits' => $produit,
            'categories' => $categories,
            'tags' => $tags,
            'promotions' => $promotions,
            'nombre_prod' => $nombre_prod,
        ]);
    }




    public function addProduit(Request $request)
    {  // Fonction AJAX

        //Récupération de l'Id et la quantité de produit
        $id = $request->input('prod_id');
        $qt = $request->input('prod_qt');

        // Le client est-il connecté ?
        if (Auth::check()) {
            // Récupération du produit dans la BD ainsi que toutes ses caractéristiques
            $product = Produit::where('id', $id)->first();

            if ($product) {
                // Vérification de l'existence du produit dans le panier
                if (Panier::where('id_prod', $id)
                    ->where('id_user', Auth::id())
                    ->exists()
                ) {
                    return response()
                        ->json(['status' => 'deja dans le panier']);
                } else {
                    // Ajout du produit dans la BD
                    $cart = new Panier();
                    $cart->id_prod = $id;
                    $cart->id_user = Auth::id();
                    $cart->qt_prod = $qt;
                    $cart->save();
                    return response()->json([
                        'status' => 'ajouter'
                    ]);
                }
            }
        } else {
            return response()->json([
                'status' => "Connectez vous pour continuer !"
            ]);
        }

        //Cart::add($product_id, $product_name,$qt,$product_price);
    }



    public function ProduitApercu($id)
    {

        //Récuperation de tous les produits
        $produits = Produit::where('produits.deleted_at', null)
            ->join('categories', 'categories.id', '=', 'produits.id_cat') // Jointure avec les catégories
            ->select('produits.*', 'categories.lib_cat as lib_cat') // Choix de ce qu'on veut récupérer dans la requête
            ->get();
        // Récuperation des catégories
        $categories = Categorie::where('deleted_at', null)
            ->get();
        // Récupération des tags
        $tags = Tag::where('deleted_at', null)
            ->get();

        // Récupération du produit spécifique

        //->join('categories', 'categories.id', '=', 'produits.id_cat')

        $MonProduits = Produit::find($id);
        $MesCategories = Categorie::find($MonProduits->id_cat);

        //$users = Produit::all();
        //$users = $users->intersect(Produit::whereIn('id', [1, 2, 3])->get());
        //$users = rand(10,25) ;
        //dd($users) ;

        // Récupération du nombre total de produit dans le panier
        if (Auth::check()) {
            $cart = Panier::where('id_user', Auth::id())
                ->get();
            $val = 0;
            foreach ($cart as $key) {
                $var = 1 * $key->qt_prod;
                $val = $val + $var;
            }

            $nombre_prod = $val;
        } else {
            $nombre_prod = 0;
        }
        // Appel de la vue en passant les données
        return view('description', [
            'produits' => $produits,
            'categories' => $categories,
            'tags' => $tags,
            'MonProduits' => $MonProduits,
            'MesCategories' => $MesCategories,
            'nombre_prod' => $nombre_prod,
        ]);
    }


    public function showCart(array $detailsTransaction = [])
    {
        // Récupération des éléments concernant le client connecté
        $cart = Panier::where('id_user', Auth::id())->get();
        // Récupération du nombre total de produit dans le panier
        $nombre_prod = 0;
        if (Auth::check())
            foreach ($cart as $key)
                $nombre_prod += $key->qt_prod;
        // Appel de la vue en passant les données
        return view('panier', [
            'cart' => $cart,
            'nombre_prod' => $nombre_prod,
            'detailsTransaction' => $detailsTransaction,
        ]);
    }

    public function destroyproduit($id)
    {
        // Récupération de l'Id du produit
        $prod_id = $id;

        if (Auth::check()) {

            if (Panier::where('id_prod', $prod_id)
                ->where('id_user', Auth::id())
                ->exists()
            ) {
                //Récupération du produit concerné
                $items = Panier::where('id_prod', $prod_id)
                    ->where('id_user', Auth::id())
                    ->first();
                //Suppression du produit
                $items->delete();

                return back();
            }
        }
    }

    public function updatequantite(Request $request)
    { // Fonction Ajax

        // Récupération de l'Id du produit
        $id_prod = $request->input('prod_id');
        //Récupération de la quantité du produit
        $qt_prod = $request->input('prod_qt');

        if (Auth::check()) {
            // Le produit existe-il ?
            if (Panier::where([['id_prod', $id_prod], ['id_user', Auth::id()]])->exists()) {
                //Récupération du produit en question
                $items = Panier::where([['id_prod', $id_prod], ['id_user', Auth::id()]])->first();
                //Ajout de la nouvelle quantité
                $items->qt_prod = $qt_prod;
                //Mise à jour dans la BD
                $items->update();
                return response()->json([
                    'status' => "Quantité mise à jour !"
                ]);
            }
        }
    }

    public function ValidateCommand()
    {
        if (Auth::check()) {
            // Récupération de tous les produit concernant le clients connecté
            $cart = Panier::where('id_user', Auth::id())->get();
            // Récupération des information du client
            $user_info = User::find(Auth::id());
            // Récupération du nombre total de produit dans le panier
            $nombre_prod = 0;
            $montant_total = 0;
            if (Auth::check())
                foreach ($cart as $item) {
                    $nombre_prod += $item->qt_prod;
                    $montant_total += $item->produits->prix_prod * $item->qt_prod;
                }
            // chargement du bouton de paiement
            $paiement = new PaiementController;
            $paymentForm = $paiement->paymentForm($montant_total);
            // Appel de la vue en passant les données
            return view('check', [
                'cart' => $cart,
                'user_info' => $user_info,
                'nombre_prod' => $nombre_prod,
                'paymentForm' => $paymentForm,
            ]);
        }
    }
}
