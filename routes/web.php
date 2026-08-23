<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'dashboard'])
    ->name('dashboard');

Route::get('/auth/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::get('/auth/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/auth/register', [AuthController::class, 'register'])
    ->name('auth.register');

Route::post('/auth/login', [AuthController::class, 'login'])
    ->name('auth.login');

