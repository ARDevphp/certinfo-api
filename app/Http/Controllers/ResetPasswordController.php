<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function reset(Request $request)
    {
        $request->validate([
            'secretKey' => 'required',
            'newPassword' => 'required|string|min:6',
        ]);

        $resetEntry = DB::table('password_reset_tokens')
            ->where('token', $request->secretKey)
            ->first();

        if (!$resetEntry) {
            return response()->json(['message' => 'Token noto‘g‘ri yoki eskirgan.'], 400);
        }

        if (Carbon::parse($resetEntry->created_at)->addMinutes(60)->isPast()) {
            return response()->json(['message' => 'Token eskirgan.'], 400);
        }

        $user = User::where('email', $resetEntry->email)->first();

        if (!$user) {
            return response()->json(['message' => 'Foydalanuvchi topilmadi.'], 404);
        }

        $user->update([
            'password' => Hash::make($request->secretKey)
        ]);

        DB::table('password_reset_tokens')->where('email', $resetEntry->email)->delete();

        return $this->response([
            'message' => 'Parol muvaffaqiyatli yangilandi',
        ]);
    }

}
