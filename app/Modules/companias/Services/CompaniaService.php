<?php

namespace App\Modules\companias\Services;

use App\Models\Compania;
use Illuminate\Pagination\LengthAwarePaginator;

class CompaniaService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = Compania::query();

        $perPage = (int) ($filters['per_page'] ?? 15);

        return $query
            ->orderByDesc('id')
            ->paginate($perPage);
    }

    public function getById(int $id): Compania
    {
        return Compania::findOrFail($id);
    }

    public function create(array $data): Compania
    {
        return Compania::create($data);
    }

    public function update(int $id, array $data): Compania
    {
        $compania = Compania::findOrFail($id);
        $compania->update($data);

        return $compania;
    }

    public function delete(int $id): Compania
    {
        $compania = Compania::findOrFail($id);
        $compania->update(['activo' => false]);

        return $compania;
    }

    public function activate(int $id): Compania
    {
        $compania = Compania::findOrFail($id);

        $compania->update([
            'activo' => true,
        ]);

        return $compania;
    }
}
