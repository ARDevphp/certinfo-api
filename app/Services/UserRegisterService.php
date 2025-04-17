<?php

namespace App\Services;

use App\Repository\DBRepository;
use App\Actions\UserRegisterAction;

class UserRegisterService
{
    public function __construct(
        protected DBRepository $dbRepository,
        protected UserRegisterAction $userRegisterAction
    ){
    }

    public function register(array $data)
    {
        $this->dbRepository->usersPendingVerification($data['email'], $data['password']);

        $code = rand(100000, 999999);

        $this->userRegisterAction->executeCode($code, $data['email'], $data['password']);

        return $code;
    }
}
