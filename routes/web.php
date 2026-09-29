<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome')->name('welcome');

Route::resource('workshops', WorkshopController::class);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});


Route::middleware('guest')->group(function () {
    // Nur Login - Mitglieder sind bereits registriert
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});
