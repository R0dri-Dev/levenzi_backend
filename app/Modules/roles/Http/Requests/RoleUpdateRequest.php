<?php

namespace App\Modules\roles\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'guard_name' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function getData(): array
    {
        return $this->validated();
    }
}

