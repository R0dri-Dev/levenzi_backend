<?php

namespace App\Modules\instalaciones\Services;

class InstalacionQueryService
{
    public function parseFilters(array $input): array
    {
        return [
            'activo' => array_key_exists('activo', $input)
                ? filter_var($input['activo'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)
                : null,
            'sede_id' => array_key_exists('sede_id', $input) ? (int) $input['sede_id'] : null,
            'per_page' => $input['per_page'] ?? 15,
        ];
    }
}

