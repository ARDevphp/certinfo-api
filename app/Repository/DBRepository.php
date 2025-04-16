<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function getToken(string $token)
    {
        return DB::table('password_reset_tokens')->where('token', $token)->first();
    }

    public function tokenDelete(string $email): void
    {
        DB::table('password_reset_tokens')->where('email', $email)->delete();
    }
}
