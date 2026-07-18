<?php

namespace App\Modules\ProductoConversiones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoConversionUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'producto_id' => ['sometimes', 'integer', 'exists:productos,id'],
            'unidad_medida_origen_id' => ['sometimes', 'integer', 'exists:unidades_medida,id'],
            'unidad_medida_destino_id' => ['sometimes', 'integer', 'different:unidad_medida_origen_id', 'exists:unidades_medida,id'],
            'factor_conversion' => ['sometimes', 'numeric', 'min:0'],
            'activo' => ['sometimes', 'boolean'],
        ];
    }

    public function getData(): array
    {
        return $this->validated();
    }
}
