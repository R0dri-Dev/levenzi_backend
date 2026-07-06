<?php

namespace App\Modules\clientes\Services;

use App\Models\Cliente;
use Illuminate\Pagination\LengthAwarePaginator;

class ClienteService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = Cliente::query();

        if (array_key_exists('activo', $filters) && $filters['activo'] !== null) {
            $query->where('activo', (bool) $filters['activo']);
        }

        if (! empty($filters['sede_id'])) {
            $query->where('sede_id', (int) $filters['sede_id']);
        }

        $perPage = (int) ($filters['per_page'] ?? 15);

        return $query->orderByDesc('id')->paginate($perPage);
    }

    public function getById(int $id): Cliente
    {
        return Cliente::findOrFail($id);
    }

    public function create(array $data): Cliente
    {
        return Cliente::create($data);
    }

    public function update(int $id, array $data): Cliente
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($data);

        return $cliente;
    }

    public function delete(int $id): void
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
    }
}

