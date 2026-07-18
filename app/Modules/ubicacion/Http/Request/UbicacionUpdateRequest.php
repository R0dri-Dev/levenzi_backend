<?php

namespace App\Modules\ubicacion\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UbicacionUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'latitud' => ['sometimes', 'numeric', 'between:-90,90'],
            'longitud' => ['sometimes', 'numeric', 'between:-180,180'],
        ];
    }

    public function getData(): array
    {
        return $this->validated();
    }
}
