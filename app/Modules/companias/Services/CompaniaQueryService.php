<?php

namespace App\Modules\companias\Services;

class CompaniaQueryService
{
    public function parseFilters(array $input): array
    {
        return [
            'per_page' => $input['per_page'] ?? 15,
        ];
    }
}

