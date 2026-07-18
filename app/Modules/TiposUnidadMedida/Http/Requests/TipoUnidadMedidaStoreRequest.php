<?php

namespace App\Modules\TiposUnidadMedida\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoUnidadMedidaStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:255', 'unique:tipos_unidad_medida,nombre'],
            'descripcion' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function getData(): array
    {
        return $this->validated();
    }
}
