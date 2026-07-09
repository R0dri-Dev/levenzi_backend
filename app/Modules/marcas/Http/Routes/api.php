<?php

use App\Modules\marcas\Http\Controllers\MarcaController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')
    ->prefix('marcas')
    ->group(function () {

        Route::get('/', [MarcaController::class, 'index']);
        Route::post('/', [MarcaController::class, 'store']);

        Route::get('/{id}', [MarcaController::class, 'show']);
        Route::put('/{id}', [MarcaController::class, 'update']);
        Route::patch('/{id}', [MarcaController::class, 'update']);
        Route::delete('/{id}', [MarcaController::class, 'destroy']);

    });
