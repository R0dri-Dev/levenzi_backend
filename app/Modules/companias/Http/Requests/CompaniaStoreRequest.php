<?php

namespace App\Modules\companias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniaStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:255'],
            'ruc' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'activo' => ['boolean'],
        ];
    }

    public function getData(): array
    {
        return collect($this->validated())
            ->only(['nombre', 'ruc', 'direccion', 'activo'])
            ->toArray();
    }
}

