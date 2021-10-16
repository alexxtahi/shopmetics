<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\MoyenPaiementController;
use App\Http\Controllers\ProduitCommandeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SousCategorieController;
use App\Http\Controllers\Controller;
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

// ! Route pour ajouter au panier


// ! Route vers l'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/', 'HomeController@index');

// ! Route pour faire une recherche
Route::get('/search', [ProduitController::class, 'search'])->name('products.search') ;

// ! Route pour faire une recherche selon la categorie
Route::get('/categorie', 'ProduitController@cat')->name('products.categorie');

// ! Route vers la boutique
Route::get('/boutique', [BoutiqueController::class, 'index'])->name('boutique');



// ! Route vers les contacts
Route::view('/contact', 'contact')->name('contact');



// ! Route vers le blog
Route::view('/blog', 'blog')->name('blog');



// ! Route vers le panier
Route::view('/panier', 'panier')->name('panier');


// ! Route vers la foire aux questions
Route::view('/faq', 'faq')->name('faq');


// ! Route vers la page de connexion
Route::view('/connexion', 'login')->name('login');


// ! Route vers la page d'inscription
Route::view('/inscription', 'register')->name('register'); // Page d'sincription
Route::post('/inscription', [UserController::class, 'store'])->name('register.store'); // Enregistrer un compte

/* Route pour le panier

Route :: post('/panier/ajouter', 'CartController@store')-->name('cart.store') ; */

// ! Route vers le tableau de bord
Route::view('/admin', 'admin/admin-dashboard')->name('dashboard');
