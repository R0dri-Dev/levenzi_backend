<?php

use App\Modules\companias\Http\Controllers\CompaniaController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::prefix('companias')->group(function () {
        Route::get('/', [CompaniaController::class, 'index']);
        Route::get('/{id}', [CompaniaController::class, 'show']);
        Route::post('/', [CompaniaController::class, 'store']);
        Route::put('/{id}', [CompaniaController::class, 'update']);
        Route::patch('/{id}', [CompaniaController::class, 'update']);
        Route::delete('/{id}', [CompaniaController::class, 'destroy']);
    });
});



