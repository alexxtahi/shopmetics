<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProduitController;

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

// ! Route vers le tableau de bord
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// ! Route vers les produits du tableau de bord
Route::get('/dashboard/produits', [ProduitController::class, 'index'])->middleware(['auth'])->name('admin.produits');
Route::get('/dashboard/produits/create', [ProduitController::class, 'create'])->middleware(['auth'])->name('admin.produits.create');
Route::post('/dashboard/produits/store', [ProduitController::class, 'store'])->middleware(['auth'])->name('admin.produits.store');
Route::get('/dashboard/produits/delete/{id}', [ProduitController::class, 'destroy'])->middleware(['auth'])->name('admin.produits.delete');
Route::get('/dashboard/produits/etat', [ProduitController::class, 'etat'])->middleware(['auth'])->name('admin.produits.etat');
Route::get('/dashboard/produits/edit/{id}', [ProduitController::class, 'edit'])->middleware(['auth'])->name('admin.produits.edit');
Route::post('/dashboard/produits/update/{id}', [ProduitController::class, 'update'])->middleware(['auth'])->name('admin.produits.update');
