<?php

namespace App\Services\Certificate;

use App\Repository\CertificateRepository;

class CertificateShowService
{
    public function __construct(protected CertificateRepository $certificateRepository)
    {
    }

    public function showCertificate($certificate): mixed
    {
        return $this->certificateRepository->findById($certificate);
    }
}
