<?php

namespace App\Modules\ubicacion\Http\Controller;

use App\Models\Distrito;
use App\Modules\ubicacion\Http\Request\DistritoIndexRequest;
use Illuminate\Http\JsonResponse;

class DistritoController
{
    public function index(DistritoIndexRequest $request): JsonResponse
    {
        $distritos = Distrito::where('provincia_id', $request->validated('provincia_id'))
            ->orderBy('nombre')
            ->get(['id', 'codigo', 'nombre', 'provincia_id']);

        return response()->json($distritos);
    }

    public function show(int $id): JsonResponse
    {
        $distrito = Distrito::with('provincia.departamento')->findOrFail($id);

        return response()->json($distrito);
    }
}
