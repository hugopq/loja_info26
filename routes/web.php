<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, "index"])->name('products.index');
Route::get('/products/create', [ProductController::class, "create"])->name('products.create');
Route::post('/products/store', [ProductController::class, "store"])->name('products.store');


Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

require __DIR__.'/auth.php';
