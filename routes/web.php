<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
    // return view('welcome');
    return redirect('http://localhost:8080/#/');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', '\App\Http\Controllers\DashboardController@index')->name('dashboard');

    Route::get('products/{id}/gallery', '\App\Http\Controllers\ProductController@gallery')
        ->name('products.gallery');
    Route::resource('products', '\App\Http\Controllers\ProductController');
    Route::resource('product-galleries', '\App\Http\Controllers\ProductGalleryController');
    Route::resource('product-reviews', '\App\Http\Controllers\ProductReviewController');

    Route::get('services/{id}/gallery', '\App\Http\Controllers\ServiceController@gallery')
        ->name('services.gallery');
    Route::get('services/{id}/qrcode', '\App\Http\Controllers\ServiceController@qrcode')
        ->name('services.qrcode');
    Route::resource('services', '\App\Http\Controllers\ServiceController');
    Route::resource('service-galleries', '\App\Http\Controllers\ServiceGalleryController');
    Route::resource('service-reviews', '\App\Http\Controllers\ServiceReviewController');

    Route::resource('users', '\App\Http\Controllers\UserManagementController');
    Route::resource('partners', '\App\Http\Controllers\PartnerManagementController');
    Route::get('transactions/{id}/set-status', '\App\Http\Controllers\TransactionController@setStatus')
        ->name('transactions.status');
    Route::resource('transactions', '\App\Http\Controllers\TransactionController');
});
