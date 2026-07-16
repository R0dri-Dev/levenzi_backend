<?php

namespace App\Modules\Paises\Http\Controller;

use App\Http\Controllers\Controller;
use App\Models\Pais;
use Illuminate\Http\JsonResponse;

class PaisController
{
    public function index(): JsonResponse
    {
        return response()->json(
            Pais::where('activo', true)
                ->orderBy('nombre')
                ->get(['id', 'nombre', 'codigo_iso2', 'codigo_telefono', 'longitud_min', 'longitud_max'])
        );
    }
}
