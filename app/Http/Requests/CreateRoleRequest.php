<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|unique:roles',
        ];
    }
}
