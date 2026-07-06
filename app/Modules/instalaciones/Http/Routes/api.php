<?php

use App\Modules\instalaciones\Http\Controllers\InstalacionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::get('/', [InstalacionController::class, 'index']);
    Route::get('/{id}', [InstalacionController::class, 'show']);
    Route::post('/', [InstalacionController::class, 'store']);
    Route::put('/{id}', [InstalacionController::class, 'update']);
    Route::patch('/{id}', [InstalacionController::class, 'update']);
    Route::delete('/{id}', [InstalacionController::class, 'destroy']);
});

