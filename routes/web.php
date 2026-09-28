<?php

use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome')->name('home');

Route::resource('workshops', WorkshopController::class);
