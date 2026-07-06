<?php

namespace App\Modules\roles\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'guard_name' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function getData(): array
    {
        $data = $this->validated();

        return $data + [
            'guard_name' => $data['guard_name'] ?? 'web',
        ];
    }
}

