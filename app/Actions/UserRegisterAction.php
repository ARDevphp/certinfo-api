<?php

namespace App\Actions;

use App\Jobs\SendRegisterCodeJob;
use Illuminate\Support\Facades\Cache;

class UserRegisterAction
{
    public function executeCode(string $code, string $email, string $password): void
    {
        $password = bcrypt($password);

        Cache::put("admin_verification_{$email}",
            [
                'code' => $code,
                'email' => $email,
                'password' => $password
            ], now()->addMinutes(4));

        dispatch(new SendRegisterCodeJob($email, $code));
    }
}
