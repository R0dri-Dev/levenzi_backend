<?php

namespace App\Modules\doctores\Services;

class DoctorQueryService
{
    public function parseFilters(array $input): array
    {
        return [
            'activo' => array_key_exists('activo', $input)
                ? filter_var($input['activo'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)
                : null,
            'sede_id' => $input['sede_id'] ?? null,
            'per_page' => $input['per_page'] ?? 15,
        ];
    }
}

