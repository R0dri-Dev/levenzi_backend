<?php

namespace App\Modules\ubicacion\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ProvinciaIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'departamento_id' => ['required', 'integer', 'exists:departamentos,id'],
        ];
    }
}
