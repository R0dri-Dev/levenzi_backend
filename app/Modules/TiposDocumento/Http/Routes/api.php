<?php

use App\Modules\TiposDocumento\Http\Controllers\TipoDocumentoController;
use Illuminate\Support\Facades\Route;

Route::prefix('tipos-documento')->middleware('auth:api')->group(function () {
    Route::get('/', [TipoDocumentoController::class, 'index']);
});
