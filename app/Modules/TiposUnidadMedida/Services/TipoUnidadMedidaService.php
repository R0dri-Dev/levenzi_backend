<?php

namespace App\Modules\TiposUnidadMedida\Services;

use App\Models\TipoUnidadMedida;
use Illuminate\Pagination\LengthAwarePaginator;

class TipoUnidadMedidaService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = TipoUnidadMedida::query();

        if (! empty($filters['nombre'])) {
            $query->where('nombre', 'like', '%'.$filters['nombre'].'%');
        }

        $perPage = (int) ($filters['per_page'] ?? 15);

        return $query->orderBy('nombre')->paginate($perPage);
    }

    public function getById(int $id): TipoUnidadMedida
    {
        return TipoUnidadMedida::findOrFail($id);
    }

    public function create(array $data): TipoUnidadMedida
    {
        return TipoUnidadMedida::create($data);
    }

    public function update(int $id, array $data): TipoUnidadMedida
    {
        $tipo = TipoUnidadMedida::findOrFail($id);
        $tipo->update($data);

        return $tipo;
    }

    public function delete(int $id): void
    {
        TipoUnidadMedida::findOrFail($id)->delete();
    }
}
