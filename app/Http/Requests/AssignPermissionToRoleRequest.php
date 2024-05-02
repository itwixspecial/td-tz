<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignPermissionToRoleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'role_name' => 'required|string',
            'permission_name' => 'required|string',
        ];
    }
}
