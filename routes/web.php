<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome')->name('welcome');

Route::resource('workshops', WorkshopController::class)->only(['index', 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    Route::post('/workshops/{workshop}/register', [WorkshopController::class, 'register'])->name('workshops.register');
    Route::post('/workshops/{workshop}/unregister', [WorkshopController::class, 'unregister'])->name('workshops.unregister');
    Route::patch('/workshops/{workshop}/image', [ImageController::class, 'update'])->name('workshops.image');
    Route::resource('workshops', WorkshopController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
});

Route::middleware('guest')->group(function () {
    // Nur Login - Mitglieder sind bereits registriert
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});
