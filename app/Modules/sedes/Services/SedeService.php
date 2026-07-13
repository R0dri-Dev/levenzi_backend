<?php

namespace App\Modules\sedes\Services;

use App\Models\Sede;
use Illuminate\Pagination\LengthAwarePaginator;

class SedeService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = Sede::query();

        if (array_key_exists('activo', $filters) && $filters['activo'] !== null) {
            $query->where('activo', (bool) $filters['activo']);
        }

        if (! empty($filters['compania_id'])) {
            $query->where('compania_id', (int) $filters['compania_id']);
        }

        $perPage = (int) ($filters['per_page'] ?? 15);

        return $query
            ->orderByDesc('id')
            ->paginate($perPage);
    }

    public function getById(int $id): Sede
    {
        return Sede::findOrFail($id);
    }

    public function create(array $data): Sede
    {
        return Sede::create($data);
    }

    public function update(int $id, array $data): Sede
    {
        $sede = Sede::findOrFail($id);
        $sede->update($data);

        return $sede;
    }

    public function delete(int $id): void
    {
        $sede = Sede::findOrFail($id);
        $sede->update(['activo' => false]);
    }
}

