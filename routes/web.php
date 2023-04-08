<?php

use App\Http\Controllers\AccountController;
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
    Route::get('/login', [AccountController::class, 'login'])->name('login');
    Route::post('/login-handler', [AccountController::class, 'loginHandler'])->name(
        'login.handler'
    );

    Route::get('/register', [AccountController::class, 'register'])->name('register');
    Route::post('/register-handler', [AccountController::class, 'registerHandler'])->name(
        'register.handler'
    );
});

Route::middleware('auth:customer')->group(function () {
    Route::post('/logout', [AccountController::class, 'logout'])->name('logout');

    Route::get('/account-info', [CustomerController::class, 'showInfo'])->name(
        'customer.info'
    );
});

Route::get('/search', [ProductController::class, 'search'])->name(
    'product.search'
);
Route::get('/{productSlug}/details', [ProductController::class, 'showDetails'])->name(
    'product.details'
);
Route::get('/{categorySlug}', [ProductController::class, 'findByCategorySlug'])->name(
    'product.findBy.categorySlug'
);
