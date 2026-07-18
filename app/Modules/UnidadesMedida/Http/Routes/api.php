<?php

use App\Modules\UnidadesMedida\Http\Controllers\UnidadMedidaController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::prefix('unidades-medida')->group(function () {
        Route::get('/', [UnidadMedidaController::class, 'index']);
        Route::get('/{id}', [UnidadMedidaController::class, 'show']);
        Route::post('/', [UnidadMedidaController::class, 'store']);
        Route::put('/{id}', [UnidadMedidaController::class, 'update']);
        Route::patch('/{id}', [UnidadMedidaController::class, 'update']);
        Route::delete('/{id}', [UnidadMedidaController::class, 'destroy']);
    });
});
