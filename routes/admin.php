<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\MoyenPaiementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PaiementController;

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

Route::group(['prefix' => 'dashboard'], function () {
    //! Accueil
    Route::get('/', [DashboardController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard');

    //! Commandes
    Route::group(['prefix' => 'commandes'], function () {
        Route::get('/', [CommandeController::class, 'DashboardCmd'])
            ->middleware(['auth'])
            ->name('admin.pages.commandes');

        Route::get('/etat', [CommandeController::class, 'etat'])
            ->middleware(['auth'])
            ->name('admin.pages.commandes.etat');

        Route::get('/edit/{id}', [CommandeController::class, 'edit'])
            ->middleware(['auth'])
            ->name('admin.pages.commandes.edit');

        Route::post('/update/{id}', [CommandeController::class, 'update'])
            ->middleware(['auth'])
            ->name('admin.pages.commandes.update');
    });

    //! Produits
    Route::group(['prefix' => 'produits'], function () {
        Route::get('/', [ProduitController::class, 'index'])
            ->middleware(['auth'])
            ->name('admin.pages.produits');

        Route::get('/create', [ProduitController::class, 'create'])
            ->middleware(['auth'])
            ->name('admin.pages.produits.create');

        Route::post('/store', [ProduitController::class, 'store'])
            ->middleware(['auth'])
            ->name('admin.pages.produits.store');

        Route::get('/delete/{id}', [ProduitController::class, 'destroy'])
            ->middleware(['auth'])
            ->name('admin.pages.produits.delete');

        Route::get('/etat', [ProduitController::class, 'etat'])
            ->middleware(['auth'])
            ->name('admin.pages.produits.etat');

        Route::get('/edit/{id}', [ProduitController::class, 'edit'])
            ->middleware(['auth'])
            ->name('admin.pages.produits.edit');

        Route::post('/update/{id}', [ProduitController::class, 'update'])
            ->middleware(['auth'])
            ->name('admin.pages.produits.update');
    });

    //! Catégories
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategorieController::class, 'index'])
            ->middleware(['auth'])
            ->name('admin.pages.categories');

        Route::post('/store', [CategorieController::class, 'store'])
            ->middleware(['auth'])
            ->name('admin.pages.categories.store');

        Route::get('/delete/{id}', [CategorieController::class, 'destroy'])
            ->middleware(['auth'])
            ->name('admin.pages.categories.delete');

        Route::get('/etat', [CategorieController::class, 'etat'])
            ->middleware(['auth'])
            ->name('admin.pages.categories.etat');

        Route::post('/update/{lib_cat}', [CategorieController::class, 'update'])
            ->middleware(['auth'])
            ->name('admin.pages.categories.update');
    });

    //! Moyens de paiement
    Route::group(['prefix' => 'moyen-paiements'], function () {
        Route::get('/', [MoyenPaiementController::class, 'index'])
            ->middleware(['auth'])
            ->name('admin.pages.moyen-paiements');

        Route::post('/store', [MoyenPaiementController::class, 'store'])
            ->middleware(['auth'])
            ->name('admin.pages.moyen-paiements.store');

        Route::get('/delete/{id}', [MoyenPaiementController::class, 'destroy'])
            ->middleware(['auth'])
            ->name('admin.pages.moyen-paiements.delete');

        Route::get('/etat', [MoyenPaiementController::class, 'etat'])
            ->middleware(['auth'])
            ->name('admin.pages.moyen-paiements.etat');

        Route::post('/update/{lib_moyen_paiement}', [MoyenPaiementController::class, 'update'])
            ->middleware(['auth'])
            ->name('admin.pages.moyen-paiements.update');
    });

    //! Clients
    Route::group(['prefix' => 'clients'], function () {
        Route::get('/', [ClientController::class, 'index'])
            ->middleware(['auth'])
            ->name('admin.pages.clients');

        Route::get('/create', [ClientController::class, 'create'])
            ->middleware(['auth'])
            ->name('admin.pages.clients.create');

        Route::post('/store', [ClientController::class, 'store'])
            ->middleware(['auth'])
            ->name('admin.pages.clients.store');

        Route::get('/delete/{id}', [ClientController::class, 'destroy'])
            ->middleware(['auth'])
            ->name('admin.pages.clients.delete');

        Route::get('/etat', [ClientController::class, 'etat'])
            ->middleware(['auth'])
            ->name('admin.pages.clients.etat');

        Route::get('/edit/{id}', [ClientController::class, 'edit'])
            ->middleware(['auth'])
            ->name('admin.pages.clients.edit');

        Route::post('/update/{id}', [ClientController::class, 'update'])
            ->middleware(['auth'])
            ->name('admin.pages.clients.update');
    });

    //! Solde
    Route::group(['prefix' => 'balance'], function () {
        // Route::get('/admin', [PaiementController::class, 'generateToken']); // test
        Route::get('/', [PaiementController::class, 'balance'])
            ->middleware(['auth'])
            ->name('admin.account.balance');
    });
});
