<?php

namespace App\Services\Person;

use App\Models\Person;
use App\Repository\PersonRepository;
use App\Repository\UserRepository;
use App\Services\Photo\PhotoService;

class PersonUpdateService
{
    public function __construct(
        protected PersonRepository $personRepository,
        protected UserRepository $userRepository,
        protected PhotoService $photoService,
    ) {}

    public function updatePerson(array $data, int $id): string
    {
        $person = $this->personRepository->findById($id);
        $user = $person ? $this->userRepository->findById($person->user_id) : $this->userRepository->findById($id);

        $data['photo_id'] = $this->photoService->updatePhoto(
            $data['photo_id'] ?? null,
            $data['newPhoto_id'] ?? null,
            $person
        );

        if (!$person) {
            $this->personRepository->create($data, $user->id);
            return "Foydalanuvchini yangi ism familyasi qo'shildi";
        }

        if ($user->email !== $data['email']) {
            $this->userRepository->updateByEmail($user->id, $data['email']);
        }

        $this->personRepository->update($person->id, [
            'firstname' => $data['firstname'],
            'lastname'  => $data['lastname'],
            'photo_id'  => $data['photo_id'],
        ]);

        return "Foydalanuvchini ism familyasi o'zgartirildi";
    }
}
