<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStatisticRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'notes' => 'nullable|string',
        ];
    }
}
