<?php

declare(strict_types=1);

namespace App\Services\Certificate;

use App\Repository\CertificateRepository;
use App\Repository\PersonRepository;
use App\Repository\PhotoRepository;
use App\Repository\UserRepository;
use Carbon\Carbon;

class CertificateService
{
    public function __construct(
        protected CertificateRepository $certificateRepository,
        protected PhotoRepository       $photoRepository,
        protected PersonRepository      $personRepository,
        protected UserRepository        $userRepository,
        protected QrCodeService        $qrCodeService
    ){
    }

    public function createCertificate(array $data)
    {
        $user = $this->userRepository->findByEmail($data['student_email']);
        $person = $this->personRepository->findByUserId($user->id);

        $data['people_id'] = 3;
        $data['file_path'] = 3;
        $data['created_at'] = Carbon::now();

        $cert = $this->certificateRepository->store($data);

        return $cert;
    }

    public function mergeQrWithTemplate(string $name, string $surname, string $course_name, $current_url): string
    {
        $svgTemplatePath = storage_path("app/public/certificate/certificateTemplate.svg");
        $svgContent = file_get_contents($svgTemplatePath);

        $svgContent = str_replace('{{ date }}', now()->format('Y'), $svgContent);
        $svgContent = str_replace('{{ name }}', $name, $svgContent);
        $svgContent = str_replace('{{ surname }}', $surname, $svgContent);
        $svgContent = str_replace('{{ course_name }}', $course_name, $svgContent);

        $qrPath = $this->qrCodeService->generateQrCode($current_url);

        $qrBinary = (string)$qrPath;
        $svg = base64_encode($qrBinary);
        $qrImageDataUri = 'data:image/png;base64,' . $svg;

        $svgContent = str_replace('{{ qrSvg }}', $qrImageDataUri, $svgContent);

        $outputSvgPath = storage_path("app/public/certificatePhotos/{$name}_" . uniqid() . "_certificate.svg");
        file_put_contents($outputSvgPath, $svgContent);

        return $outputSvgPath;
    }
}
