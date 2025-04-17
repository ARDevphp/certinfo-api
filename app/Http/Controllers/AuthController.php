<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreAuthRequest;

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
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return $this->response(['message' => 'Successfully logged out'], 204);
    }
}
