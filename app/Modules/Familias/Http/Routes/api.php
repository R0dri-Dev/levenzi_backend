<?php

use App\Modules\Familias\Http\Controllers\FamiliaController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::prefix('familias')->group(function () {
        Route::get('/', [FamiliaController::class, 'index']);
        Route::get('/{id}', [FamiliaController::class, 'show']);
        Route::post('/', [FamiliaController::class, 'store']);
        Route::put('/{id}', [FamiliaController::class, 'update']);
        Route::patch('/{id}', [FamiliaController::class, 'update']);
        Route::delete('/{id}', [FamiliaController::class, 'destroy']);
    });
});
