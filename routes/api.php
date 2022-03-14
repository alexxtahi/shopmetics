<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CommandeController;
use App\Http\Controllers\Api\LivraisonController;
use App\Http\Controllers\Api\MoyenPaiementController;
use App\Http\Controllers\Api\ProduitController;
use App\Http\Controllers\Api\ProduitCommandeController;
use App\Http\Controllers\Api\SousCategorieController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    });



// route pour le client
Route::apiResource('Client', ClientController::class);
// route pour l'admin
Route::apiResource('Admin', AdminController::class);
// route pour la cart
Route::apiResource('Cart', CartController::class);
// route pour la commande
Route::apiResource('Commande', CommandeController::class);
// route pour livraison
Route::apiResource('Livraison', LivraisonController::class);
// route pour le moyen de paiement
Route::apiResource('MoyenPaiement', MoyenPaiementController::class);
// route pour le produit
Route::apiResource('Produit', ProduitController::class);
// route pour le clieproduit commander
Route::apiResource('ProduitCommande', ProduitCommandeController::class);
// route pour le sous categorie
Route::apiResource('SousCategorie', SousCategorieController::class);
