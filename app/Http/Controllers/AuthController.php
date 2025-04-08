<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Requests\StoreAuthRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(StoreAuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $this->throwValidationError("Bunday foydalanuv ro'yxatdan o'tmagan");
        }

        if (!Hash::check($request->password, $user->password)) {
           $this->throwValidationError("Parol noto'g'ri kiritildi");
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

    private function throwValidationError(string $message): ValidationException
    {
        return ValidationException::withMessages(['message' => $message]);
    }
}
