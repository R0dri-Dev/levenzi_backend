<?php

namespace App\Modules\UnidadesMedida\Services;

class UnidadMedidaQueryService
{
    public function parseFilters(array $input): array
    {
        return [
            'tipo_unidad_medida_id' => $input['tipo_unidad_medida_id'] ?? null,
            'activo' => $input['activo'] ?? null,
            'base' => $input['base'] ?? null,
            'nombre' => $input['nombre'] ?? null,
            'per_page' => $input['per_page'] ?? 15,
        ];
    }
}
