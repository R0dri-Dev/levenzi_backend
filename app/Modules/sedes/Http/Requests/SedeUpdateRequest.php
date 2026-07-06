<?php

namespace App\Modules\sedes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SedeUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'compania_id' => ['sometimes', 'integer', 'min:1'],
            'nombre' => ['sometimes', 'string', 'max:255'],
            'codigo' => ['sometimes', 'string', 'max:255'],
            'direccion' => ['sometimes', 'string', 'max:255'],
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

