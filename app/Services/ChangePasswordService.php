<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ChangePasswordService
{
    public function changePassword(array $data): void
    {
        $user = auth()->user();

        if (!Hash::check($data['oldPassword'], $user->password)) {
            throw new ModelNotFoundException('Eski parol xato kiritildi');
        }

        $user->update([
            'password' => Hash::make($data['newPassword'])
        ]);
    }
}
