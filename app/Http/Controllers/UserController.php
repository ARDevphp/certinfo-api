<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\UserResource;
use App\Services\UserRegisterService;
use App\Http\Requests\StoreUserRequest;
use App\Services\ChangePasswordService;
use App\Services\VerificationCodeService;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\VerificationCodeRequest;

class UserController extends Controller
{
    public function __construct(
        protected UserRegisterService  $userRegisterService,
        protected ChangePasswordService $changePasswordService,
        protected VerificationCodeService $verificationCodeService,
    )
    {
    }


    public function user(Request $request): JsonResponse
    {
        return $this->response(new UserResource($request->user()), 200);
    }


    public function register(StoreUserRequest $request)
    {
        $this->userRegisterService->register($request->validated());

        return $this->response([
            'email' => $request->email,
            'massage' => "Admin Bo'lish uchun ruxsatni kuting yoki pochtaga yuborilga tasdiqlash kodni kiriting",
        ], 201);
    }

    public function verificationCode(VerificationCodeRequest $request)
    {
        $user = $this->verificationCodeService->execute($request->validated());

        return $this->response([
            'token' => $user->createToken('token')->plainTextToken,
            'user' => new UserResource($user),
            'message' => "Siz muvaffaqiyatli ro'yxatsan o'tingiz"
        ], 201);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $this->changePasswordService->changePassword($request->validated());

        return $this->response(['message' => 'Parol yangilandi'], 201);
    }

    public function deleteUser(Request $request): JsonResponse
    {
        $user = $request->user();
        $user->delete();

        return $this->response(['message' => "Foydalanuvchi o'chirilidi"], 204);
    }
}
