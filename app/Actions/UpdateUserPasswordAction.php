<?php

namespace App\Actions;

use App\Repository\DBRepository;
use App\Jobs\SendResetPasswordJob;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateUserPasswordAction
{
    public function __construct(protected UserRepository $userRepository, protected DBRepository $dbRepository)
    {
    }

    public function execute(string $email, string $newPassword): void
    {
        $user = $this->userRepository->findByEmail($email);

        if (!$user) {
            throw new ModelNotFoundException("Foydalanuvchi topilmadi");
        }

        $this->userRepository->updatePassword($user->id, Hash::make($newPassword));

        dispatch(new SendResetPasswordJob($user));

        $this->dbRepository->tokenDelete($email);
    }
}
