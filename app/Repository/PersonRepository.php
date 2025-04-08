<?php

namespace App\Repository;

use App\Models\Person;

class PersonRepository
{
    public function findByUserId(int $userId): Person
    {
        return Person::where('user_id', $userId)->first();
    }
}
