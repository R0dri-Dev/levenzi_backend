<?php

namespace App\Modules\marcas\Services;

use App\Models\Marca;
use Illuminate\Pagination\LengthAwarePaginator;

class MarcaService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = Marca::query();

        if (array_key_exists('activo', $filters) && $filters['activo'] !== null) {
            $query->where('activo', (bool) $filters['activo']);
        }

        $perPage = (int) ($filters['per_page'] ?? 15);

        return $query->orderByDesc('id')->paginate($perPage);
    }

    public function getById(int $id): Marca
    {
        return Marca::findOrFail($id);
    }

    public function create(array $data): Marca
    {
        return Marca::create($data);
    }

    public function update(int $id, array $data): Marca
    {
        $marca = Marca::findOrFail($id);
        $marca->update($data);

        return $marca;
    }

    public function delete(int $id): void
    {
        $marca = Marca::findOrFail($id);
        $marca->delete();
    }
}

