<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Productcontroller;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/products', [Productcontroller::class, 'index'])->name('products.index');
// Route::get('/products/filter', [Productcontroller::class, 'filter'])->name('products.filter');

Route::get('/', [ProductController::class, 'index']);
Route::get('/api/categories', [ProductController::class, 'getCategories']);
Route::get('/api/brands', [ProductController::class, 'getBrands']);
Route::get('/api/products', [ProductController::class, 'getProducts']);