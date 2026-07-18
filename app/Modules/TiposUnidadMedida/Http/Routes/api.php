<?php

use App\Modules\TiposUnidadMedida\Http\Controllers\TipoUnidadMedidaController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::prefix('tipos-unidad-medida')->group(function () {
        Route::get('/', [TipoUnidadMedidaController::class, 'index']);
        Route::get('/{id}', [TipoUnidadMedidaController::class, 'show']);
        Route::post('/', [TipoUnidadMedidaController::class, 'store']);
        Route::put('/{id}', [TipoUnidadMedidaController::class, 'update']);
        Route::patch('/{id}', [TipoUnidadMedidaController::class, 'update']);
        Route::delete('/{id}', [TipoUnidadMedidaController::class, 'destroy']);
    });
});
