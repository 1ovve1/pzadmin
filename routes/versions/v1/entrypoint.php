<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

$privateRoutes = glob(__DIR__.'/private/*.php');
$publicRoutes = glob(__DIR__.'/public/*.php');

Route::prefix('/v1')->name('v1.')->group(function () use ($privateRoutes, $publicRoutes) {
    foreach ($publicRoutes as $publicRouteFile) {
        require $publicRouteFile;
    }

    Route::middleware('auth:sanctum')->group(function () use ($privateRoutes) {
        foreach ($privateRoutes as $privateRouteFile) {
            require $privateRouteFile;
        }
    });
});
