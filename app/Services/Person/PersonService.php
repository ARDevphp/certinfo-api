<?php

namespace App\Services\Person;

use App\Http\Resources\PersonResource;
use App\Http\Resources\UserResource;
use App\Repository\PersonRepository;
use App\Repository\UserRepository;

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
