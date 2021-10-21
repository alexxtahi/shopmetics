<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;

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
Route::get('/dashboard/produits', [ProduitController::class, 'index'])->middleware(['auth'])->name('admin.pages.produits');
Route::get('/dashboard/produits/create', [ProduitController::class, 'create'])->middleware(['auth'])->name('admin.pages.produits.create');
Route::post('/dashboard/produits/store', [ProduitController::class, 'store'])->middleware(['auth'])->name('admin.pages.produits.store');
Route::get('/dashboard/produits/delete/{id}', [ProduitController::class, 'destroy'])->middleware(['auth'])->name('admin.pages.produits.delete');
Route::get('/dashboard/produits/etat', [ProduitController::class, 'etat'])->middleware(['auth'])->name('admin.pages.produits.etat');
Route::get('/dashboard/produits/edit/{id}', [ProduitController::class, 'edit'])->middleware(['auth'])->name('admin.pages.produits.edit');
Route::post('/dashboard/produits/update/{id}', [ProduitController::class, 'update'])->middleware(['auth'])->name('admin.pages.produits.update');

// ! Route vers les catégories du tableau de bord
Route::get('/dashboard/categories', [CategorieController::class, 'index'])->middleware(['auth'])->name('admin.pages.categories');
Route::get('/dashboard/categories/create', [CategorieController::class, 'create'])->middleware(['auth'])->name('admin.pages.categories.create');
Route::post('/dashboard/categories/store', [CategorieController::class, 'store'])->middleware(['auth'])->name('admin.pages.categories.store');
Route::get('/dashboard/categories/delete/{id}', [CategorieController::class, 'destroy'])->middleware(['auth'])->name('admin.pages.categories.delete');
Route::get('/dashboard/categories/etat', [CategorieController::class, 'etat'])->middleware(['auth'])->name('admin.pages.categories.etat');
Route::get('/dashboard/categories/edit/{id}', [CategorieController::class, 'edit'])->middleware(['auth'])->name('admin.pages.categories.edit');
Route::post('/dashboard/categories/update/{lib_cat}', [CategorieController::class, 'update'])->middleware(['auth'])->name('admin.pages.categories.update');
