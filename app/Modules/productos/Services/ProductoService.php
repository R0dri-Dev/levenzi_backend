<?php

namespace App\Modules\productos\Services;

use App\Models\Producto;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductoService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = Producto::query();

        if (! empty($filters['familia_id'])) {
            $query->where('familia_id', (int) $filters['familia_id']);
        }

        if (array_key_exists('activo', $filters) && $filters['activo'] !== null) {
            $query->where('activo', (bool) $filters['activo']);
        }

        if (! empty($filters['nombre'])) {
            $query->where('nombre', 'like', '%'.$filters['nombre'].'%');
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
        return Producto::create($data);
    }

    public function update(int $id, array $data): Producto
    {
        $producto = Producto::findOrFail($id);
        $producto->update($data);

        return $producto;
    }

    public function delete(int $id): Producto
    {
        $producto = Producto::findOrFail($id);
        $producto->update(['activo' => false]);

        return $producto;
    }
}
