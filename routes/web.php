<?php

use Illuminate\Support\Facades\Route;

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

Route::get(
    '/', // uri
    function () {
        return view('home');
    }
);

Route::get(
    '/', // uri
    function () {
        return view('boutique');
    }
);

/* Route pour le panier

Route :: post('/panier/ajouter', 'CartController@store')-->name('cart.store') ; */

// Route pour le tableau de bord
Route::view('/admin', 'admin/admin-dashboard')->name('admin');
