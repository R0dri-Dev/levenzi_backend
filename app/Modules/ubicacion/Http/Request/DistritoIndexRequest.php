<?php

namespace App\Modules\ubicacion\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class DistritoIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'provincia_id' => ['required', 'integer', 'exists:provincias,id'],
        ];
    }
}
