<?php

use App\Modules\ubicacion\Http\Controller\DepartamentoController;
use App\Modules\ubicacion\Http\Controller\DistritoController;
use App\Modules\ubicacion\Http\Controller\ProvinciaController;
use Illuminate\Support\Facades\Route;

Route::prefix('ubicacion')->middleware('auth:api')->group(function () {
    Route::get('departamentos', [DepartamentoController::class, 'index']);
    Route::get('provincias', [ProvinciaController::class, 'index']);
    Route::get('distritos', [DistritoController::class, 'index']);
    Route::get('distritos/{id}', [DistritoController::class, 'show']);
});
