<?php

namespace App\Modules\UnidadesMedida\Services;

use App\Models\UnidadMedida;
use Illuminate\Pagination\LengthAwarePaginator;

class UnidadMedidaService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = UnidadMedida::query();

        if (! empty($filters['tipo_unidad_medida_id'])) {
            $query->where('tipo_unidad_medida_id', (int) $filters['tipo_unidad_medida_id']);
        }

        if (array_key_exists('activo', $filters) && $filters['activo'] !== null) {
            $query->where('activo', (bool) $filters['activo']);
        }

        if (array_key_exists('base', $filters) && $filters['base'] !== null) {
            $query->where('base', (bool) $filters['base']);
        }

        if (! empty($filters['nombre'])) {
            $query->where('nombre', 'like', '%'.$filters['nombre'].'%');
        }

        $perPage = (int) ($filters['per_page'] ?? 15);

        return $query->orderBy('tipo_unidad_medida_id')->orderBy('nombre')->paginate($perPage);
    }

    public function getById(int $id): UnidadMedida
    {
        return UnidadMedida::findOrFail($id);
    }

    public function create(array $data): UnidadMedida
    {
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        return UnidadMedida::create($data);
    }

    public function update(int $id, array $data): UnidadMedida
    {
        $unidad = UnidadMedida::findOrFail($id);
        $data['updated_by'] = auth()->id();
        $unidad->update($data);

        return $unidad;
    }

    public function delete(int $id): UnidadMedida
    {
        $unidad = UnidadMedida::findOrFail($id);
        $unidad->update(['activo' => false, 'updated_by' => auth()->id()]);

        return $unidad;
    }
}
