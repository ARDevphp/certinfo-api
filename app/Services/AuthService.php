<?php

namespace App\Services;

use App\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function authCheck(array $data)
    {
        $user = $this->userRepository->findByEmail($data['email']);

        if (!$user) {
            throw ValidationException::withMessages( ["messege" => ["Bunday foydalanuv ro'yxatdan o'tmagan"]]);
        }

        if (!Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages(["messege" => ["Parol noto'g'ri kiritildi"]]);
        }

        return $user;
    }
}
