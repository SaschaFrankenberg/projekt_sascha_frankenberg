<?php

use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome')->name('home');
Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::resource('workshops', WorkshopController::class);
