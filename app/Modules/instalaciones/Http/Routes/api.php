<?php

use App\Modules\instalaciones\Http\Controllers\InstalacionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {

    Route::prefix('instalaciones')->group(function () {

        Route::get('/', [InstalacionController::class, 'index']);
        Route::post('/', [InstalacionController::class, 'store']);
        Route::get('/{id}', [InstalacionController::class, 'show']);
        Route::put('/{id}', [InstalacionController::class, 'update']);
        Route::patch('/{id}', [InstalacionController::class, 'update']);
        Route::delete('/{id}', [InstalacionController::class, 'destroy']);

    });

});
