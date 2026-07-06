<?php

namespace App\Modules\productos\Services;

class ProductoQueryService
{
    public function parseFilters(array $input): array
    {
        return [
            'marca_id' => $input['marca_id'] ?? null,
            'instalacion_id' => $input['instalacion_id'] ?? null,
            'activo' => $input['activo'] ?? null,
            'nombre' => $input['nombre'] ?? null,
            'per_page' => $input['per_page'] ?? 15,
        ];
    }
}

