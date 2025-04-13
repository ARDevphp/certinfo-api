<?php

namespace App\Actions\Certificate;

use App\Repository\PersonRepository;
use App\Repository\UserRepository;
use App\Models\Certificate;

class UpdateUserRelationAction
{
    public function __construct(
        protected PersonRepository $personRepository,
        protected UserRepository $userRepository,
    ){
    }

    public function updateUser(Certificate $certificate, string $newEmail): void
    {
        $people = $this->personRepository->findById($certificate->people_id);
        $oldUser = $this->userRepository->findById($people->user_id);
        $newUser = $this->userRepository->findByEmail($newEmail);

        if (!$newUser) {
            throw new \Exception('Bunday fondalanuvchi mavjud emas');
        }

        if ($newUser->id !== $oldUser->id) {
            $people->user_id = $newUser->id;
            $people->update();

            $certificate->people_id = $people->id;
        }
    }
}
