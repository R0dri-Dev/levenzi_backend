<?php

use App\Modules\permisos\Http\Controllers\PermisoController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::prefix('permisos')->group(function () {
        Route::get('/', [PermisoController::class, 'index']);
        Route::get('/{id}', [PermisoController::class, 'show']);
        Route::post('/', [PermisoController::class, 'store']);
        Route::put('/{id}', [PermisoController::class, 'update']);
        Route::patch('/{id}', [PermisoController::class, 'update']);
        Route::delete('/{id}', [PermisoController::class, 'destroy']);
    });
});



