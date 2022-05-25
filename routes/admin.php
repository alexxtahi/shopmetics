<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\MoyenPaiementController;
use App\Http\Controllers\Admin\DashboardController;

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

//! Accueil
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

//! Commandes
Route::get('/dashboard/commandes', [CommandeController::class, 'DashboardCmd'])
    ->middleware(['auth'])
    ->name('admin.pages.commandes');

Route::get('/dashboard/commandes/etat', [CommandeController::class, 'etat'])
    ->middleware(['auth'])
    ->name('admin.pages.commandes.etat');

Route::get('/dashboard/commandes/edit/{id}', [CommandeController::class, 'edit'])
    ->middleware(['auth'])
    ->name('admin.pages.commandes.edit');

Route::post('/dashboard/commandes/update/{id}', [CommandeController::class, 'update'])
    ->middleware(['auth'])
    ->name('admin.pages.commandes.update');

//! Produits
Route::get('/dashboard/produits', [ProduitController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.pages.produits');

Route::get('/dashboard/produits/create', [ProduitController::class, 'create'])
    ->middleware(['auth'])
    ->name('admin.pages.produits.create');

Route::post('/dashboard/produits/store', [ProduitController::class, 'store'])
    ->middleware(['auth'])
    ->name('admin.pages.produits.store');

Route::get('/dashboard/produits/delete/{id}', [ProduitController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('admin.pages.produits.delete');

Route::get('/dashboard/produits/etat', [ProduitController::class, 'etat'])
    ->middleware(['auth'])
    ->name('admin.pages.produits.etat');

Route::get('/dashboard/produits/edit/{id}', [ProduitController::class, 'edit'])
    ->middleware(['auth'])
    ->name('admin.pages.produits.edit');

Route::post('/dashboard/produits/update/{id}', [ProduitController::class, 'update'])
    ->middleware(['auth'])
    ->name('admin.pages.produits.update');

//! Catégories
Route::get('/dashboard/categories', [CategorieController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.pages.categories');

Route::post('/dashboard/categories/store', [CategorieController::class, 'store'])
    ->middleware(['auth'])
    ->name('admin.pages.categories.store');

Route::get('/dashboard/categories/delete/{id}', [CategorieController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('admin.pages.categories.delete');

Route::get('/dashboard/categories/etat', [CategorieController::class, 'etat'])
    ->middleware(['auth'])
    ->name('admin.pages.categories.etat');

Route::post('/dashboard/categories/update/{lib_cat}', [CategorieController::class, 'update'])
    ->middleware(['auth'])
    ->name('admin.pages.categories.update');

//! Moyens de paiement
Route::get('/dashboard/moyen-paiements', [MoyenPaiementController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.pages.moyen-paiements');

Route::post('/dashboard/moyen-paiements/store', [MoyenPaiementController::class, 'store'])
    ->middleware(['auth'])
    ->name('admin.pages.moyen-paiements.store');

Route::get('/dashboard/moyen-paiements/delete/{id}', [MoyenPaiementController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('admin.pages.moyen-paiements.delete');

Route::get('/dashboard/moyen-paiements/etat', [MoyenPaiementController::class, 'etat'])
    ->middleware(['auth'])
    ->name('admin.pages.moyen-paiements.etat');

Route::post('/dashboard/moyen-paiements/update/{lib_moyen_paiement}', [MoyenPaiementController::class, 'update'])
    ->middleware(['auth'])
    ->name('admin.pages.moyen-paiements.update');


//! Clients
Route::get('/dashboard/clients', [ClientController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.pages.clients');

Route::get('/dashboard/clients/create', [ClientController::class, 'create'])
    ->middleware(['auth'])
    ->name('admin.pages.clients.create');

Route::post('/dashboard/clients/store', [ClientController::class, 'store'])
    ->middleware(['auth'])
    ->name('admin.pages.clients.store');

Route::get('/dashboard/clients/delete/{id}', [ClientController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('admin.pages.clients.delete');

Route::get('/dashboard/clients/etat', [ClientController::class, 'etat'])
    ->middleware(['auth'])
    ->name('admin.pages.clients.etat');

Route::get('/dashboard/clients/edit/{id}', [ClientController::class, 'edit'])
    ->middleware(['auth'])
    ->name('admin.pages.clients.edit');

Route::post('/dashboard/clients/update/{id}', [ClientController::class, 'update'])
    ->middleware(['auth'])
    ->name('admin.pages.clients.update');
