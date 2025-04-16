<?php

namespace App\Services;

use App\Actions\UpdateUserPasswordAction;
use App\Actions\ValidateResetTokenAction;

class ResetPasswordService
{
    public function __construct(
        protected UpdateUserPasswordAction $updateUserPasswordAction,
        protected ValidateResetTokenAction $validateResetTokenAction
    ){
    }

    public function resetPassword(array $data): void
    {
        $token = $this->validateResetTokenAction->execute($data['secretKey']);

        $this->updateUserPasswordAction->execute($token->email, $data['newPassword']);
    }
}
