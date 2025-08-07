<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ECommerceController;
use App\Http\Controllers\DashboardController;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Your protected WooCommerce routes here
    Route::get('/products', [ECommerceController::class, 'index'])->name('products.index');
    Route::get('/orders', [ECommerceController::class, 'orders'])->name('orders.index');
    Route::get('/export/products', [ECommerceController::class, 'exportProducts'])->name('export.products');
    Route::get('/export/orders', [ECommerceController::class, 'exportOrders'])->name('export.orders');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

});

Route::get('/', function () {
    return redirect()->route('login');
});
