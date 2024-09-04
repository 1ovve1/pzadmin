<?php

use Illuminate\Support\Facades\Route;

Route::any('/{any}', \App\Http\Controllers\WelcomeController::class)->where('any', '.*');

//
//Route::get('/login', \App\Http\Controllers\LoginController::class)->name('login');
//
//Route::middleware(\App\Http\Middleware\WebAuthenticatedRedirectMiddleware::class)->prefix('/admin')->name("admin.")->group(function () {
//    Route::get('/dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
//});
