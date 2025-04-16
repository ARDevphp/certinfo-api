<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
    public function findById(int $id): User
    {
        return User::where('id', $id)->first();
    }

    public function updateByEmail(int $userId, string $email): bool
    {
        $user = $this->findById($userId);

        return $user->update(['email' => $email]);
    }

    public function updatePassword(int $userId, string $password): bool
    {
        $user = $this->findById($userId);

        return $user->update(['password' => $password]);
    }
}
