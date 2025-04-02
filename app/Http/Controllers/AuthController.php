<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreAuthRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(StoreAuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'message' => "Bunday email ro'yxatdan o'tmagan",
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'message' => "Parol noto'g'ri kiritildi",
            ]);
        }

        return $this->response([
            'token' => $user->createToken($request->email)->plainTextToken,
            'user' => new UserResource($user)
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return $this->response(['message' => 'Successfully logged out']);
    }


    public function user(Request $request): JsonResponse
    {
        return $this->response(new UserResource($request->user()));
    }
}
