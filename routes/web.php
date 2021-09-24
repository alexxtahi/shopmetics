<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoutiqueController;

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
