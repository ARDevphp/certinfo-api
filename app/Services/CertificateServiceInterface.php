<?php

declare(strict_types=1);


namespace App\Services;

interface CertificateServiceInterface
{
    public function generateCertificate(string $studentName, string $courseName, string $certificateNumber): string;
}
