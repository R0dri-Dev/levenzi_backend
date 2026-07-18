<?php

namespace App\Modules\ProductoConversiones\Services;

use App\Models\ProductoConversion;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductoConversionService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = ProductoConversion::query();

        if (! empty($filters['producto_id'])) {
            $query->where('producto_id', (int) $filters['producto_id']);
        }

        if (! empty($filters['unidad_medida_origen_id'])) {
            $query->where('unidad_medida_origen_id', (int) $filters['unidad_medida_origen_id']);
        }

        if (! empty($filters['unidad_medida_destino_id'])) {
            $query->where('unidad_medida_destino_id', (int) $filters['unidad_medida_destino_id']);
        }

        if (array_key_exists('activo', $filters) && $filters['activo'] !== null) {
            $query->where('activo', (bool) $filters['activo']);
        }

        $perPage = (int) ($filters['per_page'] ?? 15);

        return $query->orderByDesc('id')->paginate($perPage);
    }

    public function getById(int $id): ProductoConversion
    {
        return ProductoConversion::findOrFail($id);
    }

    public function create(array $data): ProductoConversion
    {
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        return ProductoConversion::create($data);
    }

    public function update(int $id, array $data): ProductoConversion
    {
        $conversion = ProductoConversion::findOrFail($id);
        $data['updated_by'] = auth()->id();
        $conversion->update($data);

        return $conversion;
    }

    public function delete(int $id): ProductoConversion
    {
        $conversion = ProductoConversion::findOrFail($id);
        $conversion->update(['activo' => false, 'updated_by' => auth()->id()]);

        return $conversion;
    }
}
