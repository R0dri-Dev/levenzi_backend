
<?php

use App\Modules\documentos\Http\Controllers\DocumentoConsultaController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')
    ->prefix('documentos')
    ->group(function () {
        Route::get('/dni', [DocumentoConsultaController::class, 'dni']);
        Route::get('/ruc', [DocumentoConsultaController::class, 'ruc']);

    });
