<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// HOME
Route::get('/', function () {
    return view('home');
});

// CRUD USER
Route::resource('user', UserController::class);

// ================== AUTH ==================

// LOGIN
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// REGISTER
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// PROFILE
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

// LOGOUT
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');