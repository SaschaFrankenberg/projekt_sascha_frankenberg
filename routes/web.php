<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::get('/workshops', [WorkshopController::class, 'index'])->name('workshops.index');

Route::middleware('auth')->group(function () {
    // Orga-Routes müssen zuerst stehen, danach resource
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    Route::post('/workshops/{workshop}/register', [WorkshopController::class, 'register'])->name('workshops.register');
    Route::post('/workshops/{workshop}/unregister', [WorkshopController::class, 'unregister'])->name('workshops.unregister');
    Route::patch('/workshops/{workshop}/image', [WorkshopController::class, 'update'])->name('workshops.image');

    Route::post('/notifications/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');

    Route::resource('workshops', WorkshopController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
});

Route::get('/workshops/{workshop}', [WorkshopController::class, 'show'])->name('workshops.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});
