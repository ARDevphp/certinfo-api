<?php

namespace App\Services\Certificate;

class CertificateSvgService
{
    public function __construct(
        protected QrCodeService $qrCodeService,
        protected StrReplaceStudentData $studentData,
        protected QrEmbedService $qrEmbedService,
        protected FileName $fileName
    ){
    }

    public function certificateSvg(string $name, string $family, string $course_name, string $current_url, $nextCertId): string
    {
        $svgContent = $this->loadTemplate();
        $svgContent = $this->studentData->replaceStudentData($svgContent, $name, $family, $course_name);

        $qrPath = $this->qrCodeService->generateQrCode($current_url . $nextCertId);
        $svgContent = $this->qrEmbedService->embed($qrPath, $svgContent);

        $nameFile = $this->fileName->fileNameGenerate($name);

        return $this->saveSvg($svgContent, $nameFile);
    }

    private function loadTemplate(): string
    {
        $path = storage_path("app/public/certificate/certificateTemplate.svg");

        return file_get_contents($path);
    }

    private function saveSvg(string $svg, string $name): string
    {
        $svgOutput = storage_path($name);
        file_put_contents($svgOutput, $svg);

        return $svgOutput;
    }
}
