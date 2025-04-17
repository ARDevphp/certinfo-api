<?php

namespace App\Services\Person;

use App\Repository\UserRepository;
use App\Http\Resources\UserResource;
use App\Repository\PersonRepository;
use App\Http\Resources\PersonResource;

class PersonService
{
    public function __construct(
        protected PersonRepository $personRepository,
        protected UserRepository $userRepository
    )
    {
    }

    public function getAllPersons(): mixed
    {
        return $this->personRepository->all();
    }

    public function personOrUserResource($id): mixed
    {
        $person = $this->personRepository->findByUserId($id);
        $user = $this->userRepository->findById($id);

        if ($person) {
            return new PersonResource($person);
        }

        return new UserResource($user);
    }
}
