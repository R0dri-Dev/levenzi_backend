<?php

namespace App\Modules\instalaciones\Services;

use App\Models\Instalacion;
use Illuminate\Pagination\LengthAwarePaginator;

class InstalacionService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = Instalacion::query();

        if (array_key_exists('activo', $filters) && $filters['activo'] !== null) {
            $query->where('activo', (bool) $filters['activo']);
        }

        if (array_key_exists('sede_id', $filters) && $filters['sede_id'] !== null) {
            $query->where('sede_id', (int) $filters['sede_id']);
        }

        $perPage = (int) ($filters['per_page'] ?? 15);

        return $query->orderByDesc('id')->paginate($perPage);
    }

    public function getById(int $id): Instalacion
    {
        return Instalacion::findOrFail($id);
    }

    public function create(array $data): Instalacion
    {
        return Instalacion::create($data);
    }

    public function update(int $id, array $data): Instalacion
    {
        $instalacion = Instalacion::findOrFail($id);
        $instalacion->update($data);

        return $instalacion;
    }

    public function delete(int $id): void
    {
        $instalacion = Instalacion::findOrFail($id);
        $instalacion->delete();
    }
}

