<?php

namespace App\Modules\ProductoConversiones\Services;

class ProductoConversionQueryService
{
    public function parseFilters(array $input): array
    {
        return [
            'producto_id' => $input['producto_id'] ?? null,
            'unidad_medida_origen_id' => $input['unidad_medida_origen_id'] ?? null,
            'unidad_medida_destino_id' => $input['unidad_medida_destino_id'] ?? null,
            'activo' => $input['activo'] ?? null,
            'per_page' => $input['per_page'] ?? 15,
        ];
    }
}
