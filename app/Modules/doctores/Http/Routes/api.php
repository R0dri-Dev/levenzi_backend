<?php

use App\Modules\doctores\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::get('/', [DoctorController::class, 'index']);
    Route::get('/{id}', [DoctorController::class, 'show']);
    Route::post('/', [DoctorController::class, 'store']);
    Route::put('/{id}', [DoctorController::class, 'update']);
    Route::patch('/{id}', [DoctorController::class, 'update']);
    Route::delete('/{id}', [DoctorController::class, 'destroy']);
});

