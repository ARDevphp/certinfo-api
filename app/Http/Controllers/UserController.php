<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user(Request $request): JsonResponse
    {
        return $this->response(new UserResource($request->user()));
    }
    public function register(StoreUserRequest $request)
    {
        $cachedData = Cache::get("verification_{$request->email}");

        if ($cachedData) {
            $password = $cachedData['password'];
        } else {

            DB::table('users_pending_verification')->updateOrInsert(
                ['email' => $request->email],
                ['password' => bcrypt($request->password), 'created_at' => now()]
            );
            $password = bcrypt($request->password);
        }

        $code = rand(100000, 999999);
        Cache::put("admin_verification_{$request->email}",
                [
                    'code' => $code,
                    'email' => $request->email,
                    'password' => $password
                ],now()->addMinutes(4));

//        Mail::to($request->email)->send(new PasswordResetCodeMail($code));

        return $this->response([
            'code' => $code,
            'email' => $request->email,
            'massage' => "Admin Bo'lish uchun ruxsatni kuting",
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = $request->user();

        if (!Hash::check($request['oldPassword'], $user->password)) {
            return response()->json(['error' => 'Eski parol xato kiritildi'], 400);
        }

        $user->update([
            'password' => Hash::make($request['newPassword'])
        ]);

        return $this->response(['message' => 'Parol yangilandi']);
    }


    public function verificationCode(Request $request)
    {
        $data = Cache::get("admin_verification_{$request->email}");

        if (!$data['code']) {
            return $this->error( "Kod eskirgan");
        }

        if ($data['code'] != $request->code) {
            return $this->error( "Tasdiqlash kodi noto'g'ri kiritildi");
        }

        $user = User::create([
            'email' =>  $data['email'],
            'password' =>  $data['password'],
        ]);

        Cache::forget("password_reset_{$request->email}");

        return $this->response([
            'token' => $user->createToken('token')->plainTextToken,
            'user' => new UserResource($user),
            'message' => "Siz muvaffaqiyatli ro'yxatsan o'tingiz"
        ]);
    }

    public function deleteUser(Request $request): JsonResponse
    {
        $user = $request->user();
        $user->delete();

        return $this->response(['message' => 'User deleted successfully']);
    }
}
