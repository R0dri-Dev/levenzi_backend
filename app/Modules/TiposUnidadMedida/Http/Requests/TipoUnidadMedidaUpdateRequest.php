<?php

namespace App\Modules\TiposUnidadMedida\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TipoUnidadMedidaUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'nombre' => ['sometimes', 'string', 'max:255', Rule::unique('tipos_unidad_medida', 'nombre')->ignore($id)],
            'descripcion' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function getData(): array
    {
        return $this->validated();
    }
}
