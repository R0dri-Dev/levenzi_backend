<?php

namespace App\Modules\ProductoConversiones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoConversionStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'producto_id' => ['required', 'integer', 'exists:productos,id'],
            'unidad_medida_origen_id' => ['required', 'integer', 'exists:unidades_medida,id'],
            'unidad_medida_destino_id' => ['required', 'integer', 'different:unidad_medida_origen_id', 'exists:unidades_medida,id'],
            'factor_conversion' => ['required', 'numeric', 'min:0'],
            'activo' => ['sometimes', 'boolean'],
        ];
    }

    public function getData(): array
    {
        $data = $this->validated();

        return array_merge($data, [
            'activo' => $data['activo'] ?? true,
        ]);
    }
}
