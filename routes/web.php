<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BajuController;

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

Route::get('/baju/create', [BajuController::class, 'create'])->name('baju.create');
Route::post('/baju', [BajuController::class, 'store'])->name('baju.store');