<?php

namespace App\Modules\productos\Services;

class ProductoQueryService
{
    public function parseFilters(array $input): array
    {
        return [
            'familia_id' => $input['familia_id'] ?? null,
            'activo' => $input['activo'] ?? null,
            'nombre' => $input['nombre'] ?? null,
            'per_page' => $input['per_page'] ?? 15,
        ];
    }
}
