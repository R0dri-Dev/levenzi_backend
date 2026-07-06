<?php

namespace App\Modules\doctores\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sede_id' => ['sometimes', 'integer', 'min:1'],
            'nombre' => ['sometimes', 'string', 'max:255'],
            'cmp' => ['nullable', 'string', 'max:100'],
            'especialidad' => ['nullable', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'activo' => ['sometimes', 'boolean'],
        ];
    }

    public function getData(): array
    {
        return $this->validated();
    }
}

