<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoutiqueController;
// Importation des routes externes
require __DIR__ . '/auth.php';
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
Route::get('/', [HomeController::class, 'index'])->name('home');

// ! Route vers le tableau de bord
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// ! Route vers la recherche d'un article

Route::get('/boutique/recherche', [BoutiqueController::class, 'searchProduct'])->name('products.recherche') ;

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


// Route pour le panier

Route::get('/monpanier/{id}', [BoutiqueController::class, 'addStore'])->name('cart.panier') ;

Route::get('/card/{id}', [BoutiqueController::class, 'viewStore'])->name('cart.store') ;

/*
Route::get('/boutique/ajout', [CartController::class, 'create'])->name('ajout.session') ;

Route::get('/boutique/destroy', [CartController::class, 'create1'])->name('destroy.session') ;
*/