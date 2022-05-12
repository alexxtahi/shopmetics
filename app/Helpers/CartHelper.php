<?php

namespace App\Helpers;

use App\Models\Panier;
use Illuminate\Support\Facades\Auth;

class CartHelper
{
    // Get the number of products in the cart
    public static function getNombreProd()
    {
        $nombre_prod = 0;
        if (Auth::check()) {
            $cart = Panier::where('id_user', Auth::id())->get();
            foreach ($cart as $prod)
                $nombre_prod += $prod->qt_prod;
        }
        return $nombre_prod;
    }
}
