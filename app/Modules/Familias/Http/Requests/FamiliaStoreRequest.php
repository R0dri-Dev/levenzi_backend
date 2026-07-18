<?php

namespace App\Modules\Familias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamiliaStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'familia_padre_id' => ['nullable', 'integer', 'exists:familias,id'],
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string', 'max:500'],
            'activo' => ['sometimes', 'boolean'],
        ];
    }

    public function getData(): array
    {
        $data = $this->validated();

        return array_merge($data, [
            'activo' => $data['activo'] ?? true,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);
    }
}
