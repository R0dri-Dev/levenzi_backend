<?php

namespace App\Modules\instalaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstalacionStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sede_id' => ['required', 'integer', 'min:1'],
            'nombre' => ['required', 'string', 'max:255'],
            'tipo' => ['nullable', 'string', 'max:255'],
            'activo' => ['sometimes', 'boolean'],
        ];
    }

    public function getData(): array
    {
        $data = $this->validated();

        return $data + [
            'activo' => $data['activo'] ?? true,
        ];
    }
}

