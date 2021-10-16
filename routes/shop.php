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

// ! Route vers la boutique
Route::post('/boutique/filtre-prix', [BoutiqueController::class, 'filterProdByPrice'])->name('boutique.filtre-prix');
