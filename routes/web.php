<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
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

Route::get('/', [ProductController::class, 'index'])->name('product.home');
Route::post('/add-product', [ProductController::class, 'addProduct'])->name('product.add');
Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('product.update');
Route::post('/delete-product', [ProductController::class, 'deleteProduct'])->name('product.delete');
