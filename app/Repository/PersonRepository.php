<?php

namespace App\Repository;

use App\Models\Person;
use Carbon\Carbon;

class PersonRepository
{
    public function findByUserId(int $id): ?Person
    {
        return Person::where('user_id', $id)->first();
    }

    public function findById(int $id): ?Person
    {
        return Person::where('id', $id)->first();
    }

    public function create(array $data, int $userId): Person
    {
        return Person::create([
            'user_id'   => $userId,
            'photo_id'  => $data['photo_id'] ?? 1,
            'firstname' => $data['firstname'],
            'lastname'  => $data['lastname'],
            'birthday'  => $data['birthday'] ?? Carbon::now(),
        ]);
    }

    public function update(int $personId, array $data): bool
    {
        $person = $this->findById($personId);

        return $person->update($data);
    }
    public function all()
    {
        return Person::all();
    }
}
