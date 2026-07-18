<?php

namespace App\Modules\UnidadesMedida\Http\Requests;

use App\Models\UnidadMedida;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UnidadMedidaUpdateRequest extends FormRequest
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

            $id = (int) $this->route('id');

            $existeOtraBase = UnidadMedida::query()
                ->where('tipo_unidad_medida_id', $this->input('tipo_unidad_medida_id'))
                ->where('base', true)
                ->where('id', '!=', $id)
                ->exists();

            if ($existeOtraBase) {
                $validator->errors()->add(
                    'base',
                    'Este tipo de unidad ya tiene otra unidad base asignada.'
                );
            }
        });
    }

    public function getData(): array
    {
        return $this->validated();
    }
}
