<?php

namespace App\Services;

use App\Actions\GenerateAndSaveTokenAction;
use App\Jobs\SendResetPasswordEmailJob;
use App\Repository\UserRepository;


class ForgetPasswordService
{
    public function __construct(
        protected GenerateAndSaveTokenAction $saveTokenAction,
        protected UserRepository $userRepository,
    ){
    }
    public function sendResetLink(string $email)
    {
        $user = $this->userRepository->findByEmail($email);

        $token = $this->saveTokenAction->generateAndSaveToken($user->email);

        dispatch(new SendResetPasswordEmailJob($user, $token));

        return $user;
    }
}
