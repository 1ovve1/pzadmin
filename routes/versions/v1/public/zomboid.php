<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Zomboid\PlayersController;
use App\Http\Controllers\Api\V1\Zomboid\ZomboidController;
use Illuminate\Support\Facades\Route;

Route::prefix('/zomboid')->name('zomboid.')->group(function () {
    Route::get('/', [ZomboidController::class, 'index'])->name('index');

    Route::prefix('/players')->name('players.')->group(function () {
        Route::get('/', [PlayersController::class, 'index'])->name('index');
    });
});
