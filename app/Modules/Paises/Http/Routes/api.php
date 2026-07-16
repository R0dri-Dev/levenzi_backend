<?php

use App\Modules\Paises\Http\Controller\PaisController;
use Illuminate\Support\Facades\Route;

Route::prefix('paises')->middleware('auth:api')->group(function () {
    Route::get('/', [PaisController::class, 'index']);
});
