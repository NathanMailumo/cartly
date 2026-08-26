<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Auth;
use Illuminate\Support\Facades\Route;

// AUTH get routes
Route::get('/', [AuthController::class, 'dashboard'])
    ->name('dashboard');

Route::get('/auth/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::get('/auth/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::get('/auth/reset', [AuthController::class, 'showReset'])
    ->name('reset');

Route::get('/auth/verify', [AuthController::class, 'showVerify'])
    ->name('auth.verify');

Route::get('/auth/password/create', [AuthController::class, 'showCreate'])
    ->name('auth.password.create');


// AUTH post routes
Route::post('/auth/register', [AuthController::class, 'register'])
    ->name('auth.register');

Route::post('/auth/login', [AuthController::class, 'login'])
    ->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout');

Route::post('/auth/reset', [AuthController::class, 'reset'])
    ->name('auth.reset');

Route::post('/auth/verify', [AuthController::class, 'verifyCode'])
    ->name('auth.verify.submit');

Route::post('/auth/password/update', [AuthController::class, 'updatePassword'])
    ->name('auth.password.update');



// Products get routes
Route::get('/products/addproduct', [ProductController::class, 'showAddProduct'])
    ->name('addProduct');

Route::get('/products/product', [ProductController::class, 'showProduct'])
    ->name('products.product');

Route::get('/products/product', [ProductController::class, 'product'])
    ->name('products.product');


// Products post routes
Route::post('/products/addproduct', [ProductController::class, 'addProduct'])
    ->name('products.addProduct');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])
    ->name('products.destroy');

