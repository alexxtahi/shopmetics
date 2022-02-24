<?php

namespace App\Http\Controllers;



//use Cart ;
use App\Models\Tag;
use App\Models\Cart;
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
        // ? Récupération de tous les résultats de la requête
        $data = $request->all();
        //dd($data);
        $priceFilterMin = $data['minamount'] = (int) str_replace('$', '', $data['minamount']);
        $priceFilterMax = $data['maxamount'] = (int) str_replace('$', '', $data['maxamount']);
        // ? Récupération des produits
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
        // ? Récupération de tous les résultats de la requête
        $data = $request->all();
        // ? Récupération des produits
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
        // ? Récupération de tous les résultats de la requête
        $data = $request->all();
        // ? Récupération des produits
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

    public function searchProduct(Request $request){

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


        $input = $request->input('q') ;
        //dd($input) ;
        $produit = Produit::where('designation', $input)->get() ;
        //dd($produit) ;

        return view ('boutique', [
            'produits' => $produit,
            'categories' => $categories,
            'tags' => $tags,
            'promotions' => $promotions,
        ]) ;
        


    }

   

   


    public function addProduit(Request $request){

        $id = $request->input('prod_id') ;
        $qt = $request->input('prod_qt') ; //$request->input('prod_qt') ;

       
        /*$product_id   = $product->id ;
        $product_name = $product->designation ;
        $product_price = $product->prix_prod ;
        $product_image =  $product->img_prod ;*/


        if (Auth::check()){

            $product = Produit::where('id', $id)->first() ;

            if ($product){

                if (Panier::where('id_prod',$id)->where('id_user', Auth::id())->exists()){
                    return response()->json(['status' => 'deja dans le panier']) ;

                }else{
                    $cart = new Panier() ;
                    $cart->id_prod = $id ;
                    $cart->id_user = Auth::id();
                    $cart->qt_prod = $qt ;
                    $cart->save() ;
                    return response()->json(['status' => 'ajouter']) ;    
                }
            }
        }
        else{
            return response()->json(['status' => "Connectez vous pour continuer !"]);
        }
 
        //Cart::add($product_id, $product_name,$qt,$product_price);
    }



    public function ProduitApercu($id){
        
        //Récuperation de tous les produits
        $produits = Produit::where('produits.deleted_at', null)
        ->join('categories', 'categories.id', '=', 'produits.id_cat') // Jointure avec les catégories
        ->select('produits.*', 'categories.lib_cat as lib_cat') // Choix de ce qu'on veut récupérer dans la requête
        ->get();
        // Récuperation des catégories
        $categories = Categorie::where('deleted_at', null)->get();
        // Récupération des tags
        $tags = Tag::where('deleted_at', null)->get();

        // Récupération du produit spécifique

        //->join('categories', 'categories.id', '=', 'produits.id_cat')

        $MonProduits = Produit::find($id) ;
        $MesCategories = Categorie::find($MonProduits->id_cat) ;

        //$users = Produit::all();
        //$users = $users->intersect(Produit::whereIn('id', [1, 2, 3])->get());
        //$users = rand(10,25) ;
        //dd($users) ;

        return view ('description',[
            'produits' => $produits,
            'categories' => $categories,
            'tags' => $tags,
            'MonProduits' => $MonProduits,
            'MesCategories' => $MesCategories,
        ]) ;
    }


    public function viewproduit(){

        $cart = Panier::where('id_user', Auth::id())->get() ;
        return view('panier',compact('cart'));

    }

    public function destroyproduit($id){

       $prod_id = $id;
       
       if (Auth::check()){

        if(Panier::where('id_prod', $prod_id)->where('id_user', Auth::id())->exists()){

            $items = Panier::where('id_prod', $prod_id)->where('id_user', Auth::id())->first() ;
            $items->delete() ;

            return back();
        }

       }else{

       }
       
        
    }



    
}
