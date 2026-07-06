<?php

namespace App\Modules\doctores\Services;

use App\Models\Doctor;
use Illuminate\Pagination\LengthAwarePaginator;

class DoctorService
{
    public function list(array $filters): LengthAwarePaginator
    {
        $query = Doctor::query();

        if (array_key_exists('activo', $filters) && $filters['activo'] !== null) {
            $query->where('activo', (bool) $filters['activo']);
        }

        if (! empty($filters['sede_id'])) {
            $query->where('sede_id', (int) $filters['sede_id']);
        }

        $perPage = (int) ($filters['per_page'] ?? 15);

        return $query->orderByDesc('id')->paginate($perPage);
    }

    public function getById(int $id): Doctor
    {
        return Doctor::findOrFail($id);
    }

    public function create(array $data): Doctor
    {
        return Doctor::create($data);
    }

    public function update(int $id, array $data): Doctor
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->update($data);

        return $doctor;
    }

    public function delete(int $id): void
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
    }
}

