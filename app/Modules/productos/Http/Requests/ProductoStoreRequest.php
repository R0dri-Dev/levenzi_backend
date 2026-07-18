<?php

namespace App\Modules\productos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'familia_id' => ['nullable', 'integer', 'exists:familias,id'],
            'codigo' => ['nullable', 'string', 'max:255'],
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string', 'max:500'],
            'precio' => ['required', 'numeric', 'min:0'],
            'activo' => ['sometimes', 'boolean'],
        ];
    }

    public function getData(): array
    {
        $data = $this->validated();

        return array_merge($data, [
            'activo' => $data['activo'] ?? true,
        ]);
    }
}
