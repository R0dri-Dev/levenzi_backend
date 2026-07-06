<?php

use App\Modules\sedes\Http\Controllers\SedeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::prefix('sedes')->group(function () {
        Route::get('/', [SedeController::class, 'index']);
        Route::get('/{id}', [SedeController::class, 'show']);
        Route::post('/', [SedeController::class, 'store']);
        Route::put('/{id}', [SedeController::class, 'update']);
        Route::patch('/{id}', [SedeController::class, 'update']);
        Route::delete('/{id}', [SedeController::class, 'destroy']);
    });
});


