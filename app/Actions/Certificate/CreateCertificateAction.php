<?php

namespace App\Actions\Certificate;

use App\Events\CertificateCreated;
use App\Repository\CertificateRepository;

class CreateCertificateAction
{
    public function __construct(protected CertificateRepository $certificateRepository)
    {
    }

    public function execute(array $data)
    {
        $certificate = $this->certificateRepository->create($data);

        CertificateCreated::dispatch($certificate);

        return $certificate;
    }
}
