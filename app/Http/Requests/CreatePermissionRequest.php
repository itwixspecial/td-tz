<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePermissionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|unique:permissions',
        ];
    }
}
