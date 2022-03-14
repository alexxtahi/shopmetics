<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoutiqueController;

/*
|--------------------------------------------------------------------------
| Shop Routes
|--------------------------------------------------------------------------
|
| Here is where you can register shop routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ! Route vers la boutique avec le filtre de prix
Route::get('/boutique/filtre-prix', [BoutiqueController::class, 'filterProdByPrice'])
    ->name('boutique.filtre-prix');

// ! Route vers la boutique avec le filtre de catégories
Route::get('/boutique/filtre-categories', [BoutiqueController::class, 'filterProdByCategorie'])
    ->name('boutique.filtre-categorie');

// ! Route vers la boutique avec le filtre de tags
Route::get('/boutique/filtre-tags', [BoutiqueController::class, 'filterProdByTags'])
    ->name('boutique.filtre-tags');
