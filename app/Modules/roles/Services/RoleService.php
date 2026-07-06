<?php

namespace App\Modules\roles\Services;

use App\Models\Role;
use Illuminate\Pagination\LengthAwarePaginator;

class RoleService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $perPage = (int) ($filters['per_page'] ?? 15);

        return Role::query()->orderByDesc('id')->paginate($perPage);
    }

    public function getById(int $id): Role
    {
        return Role::findOrFail($id);
    }

    public function create(array $data): Role
    {
        return Role::create($data);
    }

    public function update(int $id, array $data): Role
    {
        $role = Role::findOrFail($id);
        $role->update($data);

        return $role;
    }

    public function delete(int $id): void
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }
}

