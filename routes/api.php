<?php

use App\Modules\Auth\Http\Controllers\AuthController;
use App\Modules\Auth\Http\Controllers\HealthController;
use Illuminate\Support\Facades\Route;

Route::get('/health', HealthController::class);

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
});

// Modules
// Modules
require __DIR__.'/../app/Modules/companias/Http/Routes/api.php';
require __DIR__.'/../app/Modules/sedes/Http/Routes/api.php';
require __DIR__.'/../app/Modules/clientes/Http/Routes/api.php';
require __DIR__.'/../app/Modules/doctores/Http/Routes/api.php';
require __DIR__.'/../app/Modules/marcas/Http/Routes/api.php';
require __DIR__.'/../app/Modules/instalaciones/Http/Routes/api.php';
require __DIR__.'/../app/Modules/roles/Http/Routes/api.php';
require __DIR__.'/../app/Modules/usuarios/Http/Routes/api.php';
require __DIR__.'/../app/Modules/permisos/Http/Routes/api.php';
require __DIR__.'/../app/Modules/modulos/Http/Routes/api.php';
require __DIR__.'/../app/Modules/productos/Http/Routes/api.php';
require __DIR__.'/../app/Modules/ventas/Http/Routes/api.php';


















