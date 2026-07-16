<?php

namespace App\Modules\TiposDocumento\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\JsonResponse;

class TipoDocumentoController
{
    public function index(): JsonResponse
    {
        return response()->json(
            TipoDocumento::where('activo', true)
                ->orderBy('nombre')
                ->get(['id', 'codigo', 'nombre', 'longitud'])
        );
    }
}
