<?php

namespace App\Services\Certificate;

use App\Repository\PhotoRepository;
use App\Repository\CertificateRepository;

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
