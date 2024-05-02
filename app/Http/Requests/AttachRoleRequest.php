<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachRoleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ];
    }
}
