<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;
use App\Models\Cart;
use App\Models\User;
use App\Models\Panier;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{

    public function addStrore()
    {

        session([
            'key1' => 'value1',
            'key2' => 'value2',
            'key3' => 'value3',
            'key4' => 'value4',
        ]);

        return view('boutique');
    }

    public function destroyStore()
    {

        $data = $request->session()
            ->all();

        if ($request->session()
            ->has('data')
        ) {
            dd('ok');
        } else {
            dd('no');
        }

        return view('boutique');
    }

    public function addProduit(Request $request)
    {

        $id = $request->input('prod_id');
        $qt = $request->input('prod_qt'); //$request->input('prod_qt') ;


        /*$product_id   = $product->id ;
        $product_name = $product->designation ;
        $product_price = $product->prix_prod ;
        $product_image =  $product->img_prod ;*/


        if (Auth::check()) {

            $product = Produit::where('id', $id)
                ->first();

            if ($product) {

                if (Panier::where('id_prod', $id)
                    ->where('id_user', Auth::id())
                    ->exists()
                ) {
                    return response()
                        ->json(['status' => 'deja dans le panier']);
                } else {
                    $cart = new Panier();
                    $cart->id_prod = $id;
                    $cart->id_user = Auth::id();
                    $cart->qt_prod = $qt;
                    $cart->save();
                    return response()
                        ->json(['status' => 'ajouter']);
                }
            }
        } else {
            return response()
                ->json(['status' => "Connectez vous pour continuer !"]);
        }

        //Cart::add($product_id, $product_name,$qt,$product_price);
    }


    public function destroyproduit($id)
    {

        $prod_id = $id;

        if (Auth::check()) {

            if (Panier::where('id_prod', $prod_id)
                ->where('id_user', Auth::id())
                ->exists()
            ) {

                $items = Panier::where('id_prod', $prod_id)
                    ->where('id_user', Auth::id())
                    ->first();
                $items->delete();

                return back();
            }
        } else {
        }
    }
}
