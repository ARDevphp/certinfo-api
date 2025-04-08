<?php

namespace App\Actions;

use App\Services\Certificate\CertificateService;

class CreateCertificateAction
{
    public function __construct(protected CertificateService $certificateService)
    {
    }

    public function execute(array $data)
    {
        return $this->certificateService->createCertificate($data);
    }
}
