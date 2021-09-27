<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoutiqueController;

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

// ! Route vers l'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/', 'HomeController@index');

// ! Route vers la boutique
Route::get('/boutique', [BoutiqueController::class, 'index'])->name('boutique');
//Route::view('/boutique', 'boutique')->name('boutique');

/* Route pour le panier

Route :: post('/panier/ajouter', 'CartController@store')-->name('cart.store') ; */

// ! Route vers le tableau de bord
Route::view('/admin', 'admin/admin-dashboard')->name('admin');
