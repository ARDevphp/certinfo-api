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

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
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

    public function register(StoreUserRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return $this->response([
            'token' => $user->createToken($user->email)->plainTextToken,
            'user' => $user
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $validatedData = $request->validated();

        $user = $request->user();

        if (!Hash::check($validatedData['old_password'], $user->password)) {
            return $this->response(['message' => 'Old password is incorrect'], 400);
        }

        $user->update([
            'password' => Hash::make($validatedData['password'])
        ]);

        return $this->response(['message' => 'Password changed successfully']);
    }


    public function user(Request $request): JsonResponse
    {
        return $this->response(new UserResource($request->user()));
    }

    public function deleteUser(Request $request): JsonResponse
    {
        $user = $request->user();
        $user->delete();

        return $this->response(['message' => 'User deleted successfully']);
    }
}
