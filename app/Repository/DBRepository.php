<?php

namespace App\Repository;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DBRepository
{
    public function createToken(string $token, string $email): void
    {
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            [
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );
    }

    public function getToken(string $token): mixed
    {
        return DB::table('password_reset_tokens')->where('token', $token)->first();
    }

    public function tokenDelete(string $email): void
    {
        DB::table('password_reset_tokens')->where('email', $email)->delete();
    }

    public function usersPendingVerification(string $email, string $password): void
    {
        DB::table('users_pending_verification')->updateOrInsert(
            ['email' => $email],
            ['password' => bcrypt($password), 'created_at' => now()]
        );
    }
}
