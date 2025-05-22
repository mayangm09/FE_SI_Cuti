<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\KajurController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('homepage'); //supaya bisa balik ke halaman homepage selamat datang klo di klik
Route::resource(name: 'user', controller: UserController::class);
Route::get('/user/cetak', [UserController::class, 'cetak'])->name('user.cetak');
Route::resource(name: 'kajur', controller: KajurController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');