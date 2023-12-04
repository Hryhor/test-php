<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Products\ProductGetController;
use App\Http\Controllers\Products\ProductCreateController;


Route::get('/products', [ProductGetController::class, 'index'])->name('products.get-products');
Route::get('/products/{id}', [ProductGetController::class, 'show'])->name('products.get-product');


//For admin
Route::get('/products/create', [ProductCreateController::class, 'create'])->name('products.create-product');
Route::post('/products/create', [ProductCreateController::class, 'store']);