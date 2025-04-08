<?php

namespace App\Repository;

use App\Models\Certificate;
use App\Models\User;

class UserRepository
{
    public function findByEmail(string $email): User
    {
        return User::where('email', $email)->first();
    }
    public function findById(int $id): User
    {
        return Certificate::where('id', $id)->first();
    }
}
