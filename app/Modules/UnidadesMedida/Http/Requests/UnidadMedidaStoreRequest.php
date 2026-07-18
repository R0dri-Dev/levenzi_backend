<?php

namespace App\Modules\UnidadesMedida\Http\Requests;

use App\Models\UnidadMedida;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UnidadMedidaStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tipo_unidad_medida_id' => ['required', 'integer', 'exists:tipos_unidad_medida,id'],
            'nombre' => ['required', 'string', 'min:2', 'max:255'],
            'simbolo' => ['required', 'string', 'max:20'],
            'factor_base' => ['required', 'numeric', 'min:0.000001'],
            'base' => ['boolean'],
            'conversion' => ['boolean'],
            'activo' => ['boolean'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            if (! $this->boolean('base')) {
                return;
            }

            $existeBase = UnidadMedida::query()
                ->where('tipo_unidad_medida_id', $this->input('tipo_unidad_medida_id'))
                ->where('base', true)
                ->exists();

            if ($existeBase) {
                $validator->errors()->add(
                    'base',
                    'Este tipo de unidad ya tiene una unidad base asignada.'
                );
            }
        });
    }

    public function getData(): array
    {
        return $this->validated();
    }
}
