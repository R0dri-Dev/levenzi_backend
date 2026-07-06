<?php

namespace App\Modules\modulos\Services;

use App\Models\Modulo;
use Illuminate\Pagination\LengthAwarePaginator;

class ModuloService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = Modulo::query();

        if (! empty($filters['codigo'])) {
            $query->where('codigo', $filters['codigo']);
        }

        if (! empty($filters['nombre'])) {
            $query->where('nombre', 'like', '%' . $filters['nombre'] . '%');
        }

        $perPage = (int) ($filters['per_page'] ?? 15);

        return $query->orderByDesc('id')->paginate($perPage);
    }

    public function getById(int $id): Modulo
    {
        return Modulo::findOrFail($id);
    }

    public function create(array $data): Modulo
    {
        return Modulo::create($data);
    }

    public function update(int $id, array $data): Modulo
    {
        $modulo = Modulo::findOrFail($id);
        $modulo->update($data);

        return $modulo;
    }

    public function delete(int $id): void
    {
        $modulo = Modulo::findOrFail($id);
        $modulo->delete();
    }
}

