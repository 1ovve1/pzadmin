<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index']);
Route::prefix('/admin')->group(function() {
    Route::get('/login', fn() => \Inertia\Inertia::render('Admin/Login'));
});
