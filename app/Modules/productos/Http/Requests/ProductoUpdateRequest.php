<?php

namespace App\Modules\productos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'familia_id' => ['sometimes', 'nullable', 'integer', 'exists:familias,id'],
            'codigo' => ['nullable', 'string', 'max:255'],
            'nombre' => ['sometimes', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string', 'max:500'],
            'precio' => ['sometimes', 'numeric', 'min:0'],
            'activo' => ['sometimes', 'boolean'],
        ];
    }

    public function getData(): array
    {
        return $this->validated();
    }
}
