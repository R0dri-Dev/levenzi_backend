<?php

namespace App\Modules\Familias\Services;

use App\Models\Familia;
use Illuminate\Pagination\LengthAwarePaginator;

class FamiliaService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = Familia::query();

        if (array_key_exists('familia_padre_id', $filters) && $filters['familia_padre_id'] !== null) {
            $query->where('familia_padre_id', (int) $filters['familia_padre_id']);
        }

        if (array_key_exists('activo', $filters) && $filters['activo'] !== null) {
            $query->where('activo', (bool) $filters['activo']);
        }

        if (! empty($filters['nombre'])) {
            $query->where('nombre', 'like', '%'.$filters['nombre'].'%');
        }

        $perPage = (int) ($filters['per_page'] ?? 15);

        return $query->orderBy('nombre')->paginate($perPage);
    }

    public function getById(int $id): Familia
    {
        return Familia::findOrFail($id);
    }

    public function create(array $data): Familia
    {
        return Familia::create($data);
    }

    public function update(int $id, array $data): Familia
    {
        $familia = Familia::findOrFail($id);
        $familia->update($data);

        return $familia;
    }

    public function delete(int $id): void
    {
        // Evita borrar una familia que aún tiene subfamilias o productos asignados
        $familia = Familia::findOrFail($id);

        if ($familia->subfamilias()->exists() || $familia->productos()->exists()) {
            abort(422, 'No se puede eliminar: la familia tiene subfamilias o productos asociados.');
        }

        $familia->delete();
    }
}
