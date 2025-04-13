<?php

namespace App\Services\Certificate;

use App\Repository\CertificateRepository;
use App\Repository\PhotoRepository;

class CertificateDeleteService
{
    public function __construct(
        protected CertificateRepository $certificateRepository,
        protected PhotoRepository $photoRepository
    ){
    }

    public function deleteCertificate($id): void
    {
        $certificate = $this->certificateRepository->findById($id);

        if ($certificate->file_path) {
            $photo = $this->photoRepository->findById($certificate->file_path);

            $photo->delete();
        }

        $certificate->delete();
    }
}
