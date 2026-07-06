<?php

namespace App\Modules\productos\Services;

use App\Models\Producto;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductoService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = Producto::query();

        if (! empty($filters['marca_id'])) {
            $query->where('marca_id', (int) $filters['marca_id']);
        }

        if (! empty($filters['instalacion_id'])) {
            $query->where('instalacion_id', (int) $filters['instalacion_id']);
        }

        if (array_key_exists('activo', $filters) && $filters['activo'] !== null) {
            $query->where('activo', (bool) $filters['activo']);
        }

        if (! empty($filters['nombre'])) {
            $query->where('nombre', 'like', '%' . $filters['nombre'] . '%');
        }

        $perPage = (int) ($filters['per_page'] ?? 15);

        return $query->orderByDesc('id')->paginate($perPage);
    }

    public function getById(int $id): Producto
    {
        return Producto::findOrFail($id);
    }

    public function create(array $data): Producto
    {
        // 'activo' ya viene en $data
        return Producto::create($data);
    }

    public function update(int $id, array $data): Producto
    {
        $producto = Producto::findOrFail($id);
        $producto->update($data);

        return $producto;
    }

    public function delete(int $id): void
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
    }
}

