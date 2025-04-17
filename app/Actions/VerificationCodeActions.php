<?php

namespace App\Actions;

use Illuminate\Support\Facades\Cache;

class VerificationCodeActions
{
    public function getCache(string $email): array
    {
        return Cache::get("admin_verification_{$email}");
    }

    public function forgetCache(string $email): void
    {
        Cache::forget("password_reset_{$email}");
    }
}
