<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoutiqueController;
// Importation des resources d'authentification
require __DIR__ . '/auth.php';

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

// ! Route vers le tableau de bord
Route::get('/dashboard', function () {
    return view('admin.admin-dashboard');
})->middleware(['auth'])->name('dashboard');

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

/* Route pour le panier

Route :: post('/panier/ajouter', 'CartController@store')-->name('cart.store') ; */
