<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\Admin\DashboardController;

// Importation des routes externes
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/shop.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//! Accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

//! Boutique
Route::group(['prefix' => 'boutique'], function () {
    // Accueil de la boutique
    Route::get('/', [BoutiqueController::class, 'index'])->name('boutique');
    // Recherche d'un produit
    Route::get('/recherche', [BoutiqueController::class, 'searchProduct'])->name('products.recherche');
});


//! Contact
Route::view('/contact', 'contact')->name('contact');

//utilisateur
Route::get('/moncompte', [UserController::class, 'moncompte'])->name('moncompte');



//! Panier
Route::group(['prefix' => 'monpanier'], function () {
    // Accueil du panier
    Route::get('/', [BoutiqueController::class, 'showCart'])->name('panier');
    // Ajouter un produit au panier
    Route::get('/{id}', [BoutiqueController::class, 'addStore'])->name('cart.panier');
});

//! Produit
Route::group(['prefix' => 'produit'], function () {
    // Aperçu d'un produit
    Route::get('/{id}', [BoutiqueController::class, 'ProduitApercu'])->name('produit');
    // Ajouter un produit
    Route::post('/nouveau', [BoutiqueController::class, 'addProduit']);
    // Modifier la quantité d'un produit dans le panier
    Route::post('/quantite/update', [BoutiqueController::class, 'updateQuantite'])->name('qte.update');
    // Supprimer un produit
    Route::get('/destroy/{id}', [BoutiqueController::class, 'destroyProduit'])->name('produit.destroy');
});

//! Commande
Route::group(['prefix' => 'commande'], function () {

    Route::get('/', [CommandeController::class, 'index'])->middleware('auth')->name('commandes');
    Route::get('/verification', [BoutiqueController::class, 'ValidateCommand'])->name('commande.verification');
    Route::post('/paiement', [PaiementController::class, 'payment'])->name('payment');
    Route::get('/resultat', [PaiementController::class, 'returnUrl'])->name('payment.result');
});



//! Paiement


/*
Route::get('/boutique/ajout', [CartController::class, 'create']->name('ajout.session') ;

Route::get('/boutique/destroy', [CartController::class, 'create1']->name('destroy.session') ;
*/
