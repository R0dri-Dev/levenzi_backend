<?php

namespace App\Modules\modulos\Services;

class ModuloQueryService
{
    public function parseFilters(array $input): array
    {
        return [
            'codigo' => $input['codigo'] ?? null,
            'nombre' => $input['nombre'] ?? null,
            'per_page' => $input['per_page'] ?? 15,
        ];
    }
}

