<?php

namespace App\Services\Certificate;

use App\Actions\Certificate\UpdateCertificateSvgAction;
use App\Actions\Certificate\UpdateUserRelationAction;
use App\Actions\Certificate\CheckUserDataAction;
use App\Repository\CertificateRepository;

class CertificateUpdateService
{
    public function __construct(
        protected UpdateCertificateSvgAction $updateCertificateSvgAction,
        protected UpdateUserRelationAction $updateUserRelationAction,
        protected CertificateRepository $certificateRepository,
        protected CheckUserDataAction $checkUserDataAction,
    ){
    }

    public function updateCertificate($data, $id)
    {
        $certificate = $this->certificateRepository->findById($id);

        $this->updateUserRelationAction->updateUser($certificate, $data['student_email']);

        if ($this->checkUserDataAction->check($certificate, $data)) {
            $nextCertId = $this->certificateRepository->certificateMaxId();
            $certificate->file_path = $this->updateCertificateSvgAction->updateSvg($certificate, $data, $nextCertId);
        }

        $certificate->student_email = $data['student_email'];
        $certificate->student_name = $data['student_name'];
        $certificate->student_family = $data['student_family'];
        $certificate->practice = $data['practice'];
        $certificate->certificate_protection = $data['certificate_protection'];
        $certificate->course_id = $data['course_id'];
        $certificate->update();

        return $certificate;
    }
}
