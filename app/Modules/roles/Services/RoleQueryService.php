<?php

namespace App\Modules\roles\Services;

class RoleQueryService
{
    public function parseFilters(array $input): array
    {
        return [
            'per_page' => $input['per_page'] ?? 15,
        ];
    }
}

