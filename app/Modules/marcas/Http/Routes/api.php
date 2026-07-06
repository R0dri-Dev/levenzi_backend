<?php

use App\Modules\marcas\Http\Controllers\MarcaController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::get('/', [MarcaController::class, 'index']);
    Route::get('/{id}', [MarcaController::class, 'show']);
    Route::post('/', [MarcaController::class, 'store']);
    Route::put('/{id}', [MarcaController::class, 'update']);
    Route::patch('/{id}', [MarcaController::class, 'update']);
    Route::delete('/{id}', [MarcaController::class, 'destroy']);
});

