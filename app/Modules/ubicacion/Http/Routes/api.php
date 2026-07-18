<?php

use App\Modules\ubicacion\Http\Controller\DepartamentoController;
use App\Modules\ubicacion\Http\Controller\DistritoController;
use App\Modules\ubicacion\Http\Controller\ProvinciaController;
use App\Modules\ubicacion\Http\Controllers\UbicacionController;
use Illuminate\Support\Facades\Route;

Route::prefix('ubicacion')->middleware('auth:api')->group(function () {
    Route::get('departamentos', [DepartamentoController::class, 'index']);
    Route::get('provincias', [ProvinciaController::class, 'index']);
    Route::get('distritos', [DistritoController::class, 'index']);
    Route::get('distritos/{id}', [DistritoController::class, 'show']);
});


Route::middleware('auth:api')->group(function () {
    Route::prefix('ubicaciones')->group(function () {
        Route::get('/{id}', [UbicacionController::class, 'show']);
        Route::post('/', [UbicacionController::class, 'store']);
        Route::put('/{id}', [UbicacionController::class, 'update']);
        Route::patch('/{id}', [UbicacionController::class, 'update']);
        Route::delete('/{id}', [UbicacionController::class, 'destroy']);
    });
});
