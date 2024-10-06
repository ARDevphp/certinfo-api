<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
            'token' => $user->createToken($request->email)->plainTextToken
        ]);

        //return  success('token' => $user->createToken($request->email)->plainTextToken,);
    }

    public function logout(Request $request)
    {

    }

    public function register(Request $request)
    {

    }

    public function changePassword(Request $request)
    {

    }

    public function user(Request $request): JsonResponse
    {
        return $this->response(new UserResource($request->user()));
    }
}
