<?php

namespace App\Modules\Documentos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaDocumentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'numero' => ['required', 'string', 'regex:/^\d+$/'],
        ];
    }
}
