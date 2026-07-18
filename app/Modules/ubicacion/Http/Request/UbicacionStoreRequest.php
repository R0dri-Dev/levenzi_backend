<?php

namespace App\Modules\ubicacion\Http\Requests;

use App\Modules\ubicacion\Support\UbicableTypeResolver;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UbicacionStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'latitud' => ['required', 'numeric', 'between:-90,90'],
            'longitud' => ['required', 'numeric', 'between:-180,180'],
            'ubicable_type' => ['required', 'string', Rule::in(array_keys(UbicableTypeResolver::MAP))],
            'ubicable_id' => ['required', 'integer', 'min:1'],
        ];
    }

    public function getData(): array
    {
        $data = $this->validated();
        $data['ubicable_type'] = UbicableTypeResolver::resolve($data['ubicable_type']);

        return $data;
    }
}
