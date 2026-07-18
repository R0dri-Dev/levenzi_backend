<?php

namespace App\Modules\Familias\Services;

class FamiliaQueryService
{
    public function parseFilters(array $input): array
    {
        return [
            'familia_padre_id' => $input['familia_padre_id'] ?? null,
            'activo' => $input['activo'] ?? null,
            'nombre' => $input['nombre'] ?? null,
            'per_page' => $input['per_page'] ?? 15,
        ];
    }
}
