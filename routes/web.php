<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/login', fn () => \Inertia\Inertia::render('Admin/Login'))->name('login');
});
