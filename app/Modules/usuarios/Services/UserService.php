<?php

namespace App\Modules\usuarios\Services;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = User::query();

        if (array_key_exists('activo', $filters) && $filters['activo'] !== null) {
            $query->where('activo', (bool) $filters['activo']);
        }

        $perPage = (int) ($filters['per_page'] ?? 15);

        return $query->orderByDesc('id')->paginate($perPage);
    }

    public function getById(int $id): User
    {
        return User::findOrFail($id);
    }

    public function create(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'telefono' => $data['telefono'] ?? null,
            'activo' => $data['activo'] ?? true,
        ]);
    }

    public function update(int $id, array $data): User
    {
        $user = User::findOrFail($id);

        $update = $data;

        if (array_key_exists('password', $update)) {
            $update['password'] = bcrypt($update['password']);
        }

        $user->update($update);

        return $user;
    }

    public function delete(int $id): void
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}

