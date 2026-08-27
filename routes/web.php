<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Guest-only routes
Route::middleware('guest')->group(function () {
    Route::get('/auth/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');

    Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

    Route::get('/auth/reset', [AuthController::class, 'showReset'])->name('reset');
    Route::post('/auth/reset', [AuthController::class, 'reset'])->name('auth.reset');

    Route::get('/auth/verify', [AuthController::class, 'showVerify'])->name('auth.verify');
    Route::post('/auth/verify', [AuthController::class, 'verifyCode'])->name('auth.verify.submit');

    Route::get('/auth/password/create', [AuthController::class, 'showCreate'])->name('auth.password.create');
    Route::post('/auth/password/update', [AuthController::class, 'updatePassword'])->name('auth.password.update');
});

// Authenticated-only routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // Product routes
    Route::get('/products/addproduct', [ProductController::class, 'showAddProduct'])->name('addProduct');
    Route::post('/products/addproduct', [ProductController::class, 'addProduct'])->name('products.addProduct');

    Route::get('/products/product', [ProductController::class, 'showProduct'])->name('products.product');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});