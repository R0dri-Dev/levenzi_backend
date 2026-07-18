<?php

namespace App\Modules\Familias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FamiliaUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            // Evita que una familia se autoasigne como su propio padre
            'familia_padre_id' => ['nullable', 'integer', 'exists:familias,id', Rule::notIn([$id])],
            'nombre' => ['sometimes', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string', 'max:500'],
            'activo' => ['sometimes', 'boolean'],
        ];
    }

    public function getData(): array
    {
        $data = $this->validated();
        $data['updated_by'] = auth()->id();

        return $data;
    }
}
