<?php

use App\Modules\modulos\Http\Controllers\ModuloController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::prefix('modulos')->group(function () {
        Route::get('/', [ModuloController::class, 'index']);
        Route::get('/{id}', [ModuloController::class, 'show']);
        Route::post('/', [ModuloController::class, 'store']);
        Route::put('/{id}', [ModuloController::class, 'update']);
        Route::patch('/{id}', [ModuloController::class, 'update']);
        Route::delete('/{id}', [ModuloController::class, 'destroy']);
    });
});

