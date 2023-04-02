<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
    Route::post('/login-handler', [CustomerController::class, 'loginHandler'])->name(
        'customer.login.handler'
    );

    Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
    Route::post('/register-handler', [CustomerController::class, 'registerHandler'])->name(
        'customer.register.handler'
    );
});

Route::middleware('auth:customer')->group(function () {
    Route::post('/logout', [CustomerController::class, 'logout'])->name('customer.logout');

    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Route::group(['prefix' => 'manage/order'], function () {
    //     Route::get('', [OrderController::class, 'index'])->name('manage.order.index');
    //     Route::put('/update-order-status/{orderId}', [OrderController::class, 'updateOrderStatus'])->name(
    //         'manage.order.update-order-status'
    //     );
    //     Route::get('/search', [OrderController::class, 'search'])->name(
    //         'manage.order.search'
    //     );
    //     Route::get('/filter', [OrderController::class, 'filter'])->name(
    //         'manage.order.filter'
    //     );

    //     Route::get('/details/{orderId}', [OrderController::class, 'showDetails'])->name(
    //         'manage.order.details'
    //     );
    // });
});
