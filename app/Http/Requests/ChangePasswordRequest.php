<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'oldPassword' => 'required|string|min:6',
            'newPassword' => 'required|string|min:6',
        ];
    }
}
