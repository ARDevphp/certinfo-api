<?php

namespace App\Actions;

use Carbon\Carbon;
use App\Repository\DBRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class   ValidateResetTokenAction
{
    public function __construct(protected DBRepository $repository)
    {
    }

    public function execute(string $token)
    {
        $resetEntry = $this->repository->getToken($token);

        if (!$resetEntry || Carbon::parse($resetEntry->created_at)->addMinutes(180)->isPast()) {
            throw new ModelNotFoundException("Token noto'g'ri yoki eskirgan");
        }

        return $resetEntry;
    }
}
