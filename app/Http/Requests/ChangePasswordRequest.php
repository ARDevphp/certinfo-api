<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ChangePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'oldPassword' => 'required|string|min:6',
            'newPassword' => 'required|string|min:6',
        ];
    }
}
