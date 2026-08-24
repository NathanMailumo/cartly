<?php

use App\Http\Controllers\AuthController;
use App\Models\Auth;
use Illuminate\Support\Facades\Route;

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
