<?php

namespace App\Actions;

use App\Repository\DBRepository;
use Illuminate\Support\Str;

class GenerateAndSaveTokenAction
{
    public function __construct(protected DBRepository $dbRepository)
    {
    }

    public function generateAndSaveToken(string $email): mixed
    {
        $token = Str::random(64);

        $this->dbRepository->createToken($token, $email);

        return $token;
    }
}
