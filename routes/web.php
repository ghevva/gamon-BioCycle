<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\RedemptionController;
use App\Models\Product;

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

//REWARD
Route::get('/reward', [RewardController::class, 'index'])
    ->name('reward.index');

Route::post('/reward/{id}', [RewardController::class, 'redeem'])
    ->name('reward.redeem');

//PRODUCTS
Route::resource('product', RewardController::class);

Route::get('/product', [RewardController::class, 'productIndex'])
    ->name('product.index');

Route::get('/product/create', [RewardController::class, 'create'])
    ->name('product.create');

Route::post('/product', [RewardController::class, 'store'])
    ->name('product.store');

Route::get('/product/{product}/edit', [RewardController::class, 'edit'])
    ->name('product.edit');

Route::put('/product/{product}', [RewardController::class, 'update'])
    ->name('product.update');

Route::delete('/product/{product}', [RewardController::class, 'destroy'])
    ->name('product.destroy');

Route::get('/api/products', function () {
    return Product::all();
});

//PENUKARAN
Route::get('/reward/verify/{id}', [RewardController::class, 'verify'])
    ->name('reward.verify');

Route::post('/reward/confirm/{id}', [RewardController::class, 'confirm'])
    ->name('reward.confirm');

Route::get(
    '/reward-success',
    [RewardController::class, 'success']
)->name('reward.success');

Route::get(
    '/reward-history',
    [RewardController::class, 'history']
)->name('reward.history');

Route::get(
    '/redemptions',
    [RedemptionController::class, 'index']
)->name('redemption.index');

Route::post(
    '/redemptions/{redemption}/complete',
    [RedemptionController::class, 'complete']
)->name('redemption.complete');