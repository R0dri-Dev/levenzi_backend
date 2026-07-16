<?php

namespace App\Modules\clientes\Http\Requests;

use App\Core\Rules\TelefonoValidoParaPais;
use Illuminate\Foundation\Http\FormRequest;

class ClienteStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sede_id' => ['required', 'integer', 'min:1'],
            'distrito_id' => ['required', 'integer', 'min:1'],
            'nombre' => ['required', 'string', 'max:255'],
            'documento_tipo' => ['nullable', 'string', 'max:50'],
            'documento_numero' => ['nullable', 'string', 'max:100'],
            'direccion' => ['required', 'string', 'max:255'],
            'pais_id' => ['nullable', 'exists:paises,id'],
            'telefono' => ['nullable', 'string', new TelefonoValidoParaPais($this->input('pais_id'))],
            'email' => ['nullable', 'email', 'max:255'],
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
