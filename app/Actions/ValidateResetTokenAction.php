<?php

namespace App\Actions;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class   ValidateResetTokenAction
{
    public function execute(string $token)
    {
        $resetEntry = DB::table('password_reset_tokens')->where('token', $token)->first();

        if (!$resetEntry || Carbon::parse($resetEntry->created_at)->addMinutes(180)->isPast()) {
            throw new ModelNotFoundException("Token noto'g'ri yoki eskirgan");
        }

        return $resetEntry;
    }
}
