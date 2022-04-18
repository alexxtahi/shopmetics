<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PaiementController;

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

// ! Route vers l'accueil
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// ! Route vers la recherche d'un article
Route::get('/boutique/recherche', [BoutiqueController::class, 'searchProduct'])
    ->name('products.recherche');

// ! Route vers la boutique
Route::get('/boutique', [BoutiqueController::class, 'index'])
    ->name('boutique');

// ! Route vers les contacts
Route::view('/contact', 'contact')
    ->name('contact');

// ! Route vers le blog
Route::view('/blog', 'blog')
    ->name('blog');

// ! Route vers le panier
Route::get('/monpanier', [BoutiqueController::class, 'showCart'])
    ->name('panier');
Route::post('/redirection', [PaiementController::class, 'returnUrl'])
    ->name('cinetpay.return');


// ! Route vers la foire aux questions
Route::view('/faq', 'faq')
    ->name('faq');

// ! Route pour la description du produit
Route::get('/produit/{id}', [BoutiqueController::class, 'ProduitApercu'])
    ->name('produit');

//! Route pour le panier
Route::get('/monpanier/{id}', [BoutiqueController::class, 'addStore'])
    ->name('cart.panier');


// ! Route pour ajouter un produit
Route::post('/test', [BoutiqueController::class, 'addProduit']);

// ! Route pour mettre a jour la quantite du produit

Route::post('/update', [BoutiqueController::class, 'updatequantite'])
    ->name('update');

// ! Route pour supprimer un produit
Route::get('/destroy-product/{id}', [BoutiqueController::class, 'destroyproduit'])
    ->name('produit.destroy');

// ! Route vers la page de commande
Route::get('/verification', [BoutiqueController::class, 'ValidateCommand'])
    ->name('verification');

/*
Route::get('/boutique/ajout', [CartController::class, 'create'])
->name('ajout.session') ;

Route::get('/boutique/destroy', [CartController::class, 'create1'])
->name('destroy.session') ;
*/

//! Paiement
Route::post('/paiement', [PaiementController::class, 'generateCheckoutLink'])
    ->name('paiement');
