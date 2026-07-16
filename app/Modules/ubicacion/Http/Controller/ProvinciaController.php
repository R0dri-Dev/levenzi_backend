<?php

namespace App\Modules\ubicacion\Http\Controller;

use App\Models\Provincia;
use App\Modules\ubicacion\Http\Request\ProvinciaIndexRequest;
use Illuminate\Http\JsonResponse;

class ProvinciaController
{
    public function index(ProvinciaIndexRequest $request): JsonResponse
    {
        $provincias = Provincia::where('departamento_id', $request->validated('departamento_id'))
            ->orderBy('nombre')
            ->get(['id', 'codigo', 'nombre', 'departamento_id']);

        return response()->json($provincias);
    }
}
