<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public function findByEmail(string $email): User
    {
        return User::where('email', $email)->first();
    }
    public function findById(int $id): User
    {
        return User::where('id', $id)->first();
    }
}
