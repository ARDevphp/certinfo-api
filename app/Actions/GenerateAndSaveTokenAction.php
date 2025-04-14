<?php

namespace App\Actions;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class GenerateAndSaveTokenAction
{
    public function generateAndSaveToken(string $email): mixed
    {
        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            ['token' => $token,  'created_at' => Carbon::now()]
        );

        return $token;
    }
}
