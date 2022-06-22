<?php

namespace App\Helpers;

use App\Http\Controllers\PaiementController;
use App\Models\Panier;
use Illuminate\Support\Facades\Auth;

class PaymentHelper
{
    // Get the number of products in the cart
    public static function getBalance()
    {
        // Solde
        $manager = new PaiementController;
        $solde = $manager->balance()->data->amount;
        return $solde;
    }
}