<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CartHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getQuantity()
    {
        // Récupérer la quantité de produits dans le panier
        return response()->json([
            'quantity' => CartHelper::getNombreProd()
        ]);
    }
}
