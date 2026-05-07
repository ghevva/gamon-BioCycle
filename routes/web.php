<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;

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

// BOOKING
Route::resource('booking', BookingController::class);
Route::get('/booking-page', [BookingController::class, 'bookingPage'])->name('booking.page');
Route::post('/booking/{booking}/approve',
    [BookingController::class, 'approve']
)->name('booking.approve');

//ABOUT
Route::get('/about', function () {
    return view('about');
})->name('about.page');