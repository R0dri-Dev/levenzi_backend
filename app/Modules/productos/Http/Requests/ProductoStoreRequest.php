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
            'marca_id' => ['required', 'integer', 'min:1'],
            'instalacion_id' => ['required', 'integer', 'min:1'],
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

        return [
            $data,
            'activo' => $data['activo'] ?? true,
        ];
    }
}

