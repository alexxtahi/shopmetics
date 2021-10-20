<?php

use Illuminate\Support\Facades\Route;
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

// ! Route vers le tableau de bord
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// ! Route vers les produits du tableau de bord
Route::get('/dashboard/produits', [DashboardController::class, 'produitsIndex'])->middleware(['auth'])->name('admin.produits');
