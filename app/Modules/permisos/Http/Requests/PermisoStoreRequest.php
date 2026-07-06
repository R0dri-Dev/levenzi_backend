<?php

namespace App\Modules\permisos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermisoStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'modulo_id' => ['required', 'integer', 'min:1'],
            'name' => ['required', 'string', 'max:255'],
            'guard_name' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function getData(): array
    {
        $data = $this->validated();

        return [
            'modulo_id' => $data['modulo_id'],
            'name' => $data['name'],
            'guard_name' => $data['guard_name'] ?? 'web',
        ];
    }
}
