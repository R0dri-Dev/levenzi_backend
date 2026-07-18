<?php

namespace App\Modules\TiposUnidadMedida\Services;

class TipoUnidadMedidaQueryService
{
    public function parseFilters(array $input): array
    {
        return [
            'nombre' => $input['nombre'] ?? null,
            'per_page' => $input['per_page'] ?? 15,
        ];
    }
}
