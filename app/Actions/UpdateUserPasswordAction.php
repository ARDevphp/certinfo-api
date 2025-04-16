<?php

namespace App\Actions;

use App\Jobs\SendResetPasswordJob;
use App\Repository\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateUserPasswordAction
{
    public function __construct(protected UserRepository $userRepository)
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

        DB::table('password_reset_tokens')->where('email', $email)->delete();
    }
}
