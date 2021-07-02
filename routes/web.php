<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', '\App\Http\Controllers\DashboardController@index')->name('dashboard');

    Route::get('products/{id}/gallery', '\App\Http\Controllers\ProductController@gallery')
        ->name('products.gallery');
    Route::resource('products', '\App\Http\Controllers\ProductController');
    Route::resource('product-galleries', '\App\Http\Controllers\ProductGalleryController');

    Route::resource('services', '\App\Http\Controllers\ServiceController');

    Route::get('transactions/{id}/set-status', '\App\Http\Controllers\TransactionController@setStatus')
        ->name('transactions.status');
    Route::resource('transactions', '\App\Http\Controllers\TransactionController');
});
