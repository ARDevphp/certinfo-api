<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Notifications\ResetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(ResetPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            ['token' => $token,  'created_at' => Carbon::now()]
        );

        $user->notify(new ResetPasswordNotification($token));

        return response()->json(['message' => 'Parolni tiklash linki emailga yuborildi.']);
    }
}
