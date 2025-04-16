<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    public function messages()
    {
        return [
            'secretKey' => "kode xato",
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'secretKey' => 'required',
            'newPassword' => 'required|string|min:6',
        ];
    }
}
