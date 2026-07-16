<?php

namespace App\Modules\ubicacion\Http\Controller;

use App\Models\Departamento;
use Illuminate\Http\JsonResponse;

class DepartamentoController
{
    public function index(): JsonResponse
    {
        return response()->json(
            Departamento::orderBy('nombre')->get(['id', 'codigo', 'nombre'])
        );
    }
}
