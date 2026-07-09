<?php

use App\Modules\menu\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/me/menu', [MenuController::class, 'meMenu'])->middleware('auth:api');







