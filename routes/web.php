<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

    Route::get('/account-info', [CustomerController::class, 'showAccountInfo'])->name(
        'customer.account.info'
    );
});

Route::get('/search', [ProductController::class, 'search'])->name(
    'product.search'
);
Route::get('/{categorySlug}', [ProductController::class, 'findByCategorySlug'])->name(
    'product.findBy.categorySlug'
);
