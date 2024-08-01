<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Servers\ZomboidController;
use App\Http\Middleware\Api\V1\Servers\ZomboidServerStatusHandlerMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->name('v1.')->group(function () {
    Route::prefix('/servers')->name('servers.')->group(function () {
        Route::prefix('/zomboid')->name('zomboid.')->group(function () {
            Route::get('/', [ZomboidController::class, 'index'])->name('index');

            Route::middleware(ZomboidServerStatusHandlerMiddleware::class)->group(function () {
                Route::get('/start', [ZomboidController::class, 'start'])->name('start');
                Route::get('/down', [ZomboidController::class, 'down'])->name('down');
                Route::get('/restart', [ZomboidController::class, 'restart'])->name('restart');
            });
        });
    });
});
