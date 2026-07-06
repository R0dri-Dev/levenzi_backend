<?php

namespace App\Modules\modulos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuloUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['sometimes', 'string', 'max:255'],
            'codigo' => ['sometimes', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function getData(): array
    {
        return $this->validated();
    }
}

