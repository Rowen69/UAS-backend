<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BajuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/manage-items', [ItemController::class, 'manageItems'])->name('manage.items');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/baju/create', [BajuController::class, 'create'])->name('baju.create');
Route::post('/baju', [BajuController::class, 'store'])->name('baju.store');

Route::get('/baju/{id}/edit', [BajuController::class, 'edit'])->name('baju.edit');
Route::put('/baju/{id}', [BajuController::class, 'update'])->name('baju.update');

Route::delete('/baju/{id}', [BajuController::class, 'destroy'])->name('baju.destroy');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
