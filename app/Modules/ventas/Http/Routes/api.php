<?php

use App\Modules\ventas\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::prefix('ventas')->group(function () {
        Route::get('/', [VentaController::class, 'index']);
        Route::get('/{id}', [VentaController::class, 'show']);
    });
});

