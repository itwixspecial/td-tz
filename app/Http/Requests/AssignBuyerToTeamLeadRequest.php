<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignBuyerToTeamLeadRequest extends FormRequest
{
    public function rules()
    {
        return [
            'teamlead_id' => 'required|exists:users,id',
            'buyer_id' => 'required|exists:users,id',
        ];
    }
}
