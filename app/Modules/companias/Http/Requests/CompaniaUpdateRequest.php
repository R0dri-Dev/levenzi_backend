<?php

namespace App\Modules\companias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniaUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['sometimes', 'string', 'max:255'],
            'ruc' => ['sometimes', 'string', 'max:255'],
            'direccion' => ['sometimes', 'string', 'max:255'],
            'activo' => ['sometimes', 'boolean'],
        ];
    }

    public function getData(): array
    {
        return collect($this->validated())
            ->only(['nombre', 'ruc', 'direccion', 'activo'])
            ->toArray();
    }
}
