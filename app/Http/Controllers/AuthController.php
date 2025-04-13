<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService)
    {
    }

    public function login(StoreAuthRequest $request)
    {
        $user = $this->authService->authCheck($request->validated());

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
}
