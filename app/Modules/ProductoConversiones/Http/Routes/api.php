<?php

use App\Modules\ProductoConversiones\Http\Controllers\ProductoConversionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::prefix('producto-conversiones')->group(function () {
        Route::get('/', [ProductoConversionController::class, 'index']);
        Route::get('/{id}', [ProductoConversionController::class, 'show']);
        Route::post('/', [ProductoConversionController::class, 'store']);
        Route::put('/{id}', [ProductoConversionController::class, 'update']);
        Route::patch('/{id}', [ProductoConversionController::class, 'update']);
        Route::delete('/{id}', [ProductoConversionController::class, 'destroy']);
    });
});
