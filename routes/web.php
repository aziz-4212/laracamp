<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;

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
})->name('welcome');



//socialite routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handelProviderCallback'])->name('user.google.callback');

// midtrans routes
Route::get('payment/success', [CheckoutController::class, 'midtransCallback']);
Route::post('payment/success', [CheckoutController::class, 'midtransCallback']);

Route::middleware(['auth'])->group(function () {
    
    // checkout routes
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout/{camps:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout/{camps}', [CheckoutController::class, 'store'])->name('checkout.store');

    // dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

});
require __DIR__.'/auth.php';
