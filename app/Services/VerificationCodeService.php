<?php

namespace App\Services;

use App\Repository\UserRepository;
use App\Actions\VerificationCodeActions;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VerificationCodeService
{
    public function __construct(
        protected UserRepository $userRepository,
        protected VerificationCodeActions $verificationCodeActions
    )
    {
    }

    public function execute(array $data)
    {
        $dataCache = $this->verificationCodeActions->getCache($data['email']);

        if (!$dataCache['code']) {
            throw new ModelNotFoundException("Kod eskirgan");
        }

        if ($dataCache['code'] != $data['code']) {
            throw new ModelNotFoundException("Tasdiqlash kodi noto'g'ri kiritildi");
        }

        $this->verificationCodeActions->forgetCache($dataCache['email']);

        return $this->userRepository->create($dataCache['email'], $dataCache['password']);
    }
}
