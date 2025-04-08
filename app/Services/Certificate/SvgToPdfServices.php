<?php

namespace App\Services\Certificate;

use App\Repository\CertificateRepository;
use App\Repository\PhotoRepository;

class SvgToPdfServices
{
    public function __construct(
        protected CertificateRepository $certificateRepository,
        protected PhotoRepository $photoRepository,
    ){
    }

    public function pdfDownload($certificateId)
    {
        $cert = $this->certificateRepository->findById($certificateId);
        $svgRelativePath = $this->photoRepository->findById($cert->file_path);

        $pdfRelativePath = 'public/certificatePdf/' . uniqid() . '.pdf';
        $pdfFullPath = storage_path("app/{$pdfRelativePath}");

        $command = "inkscape \"{$svgRelativePath->path}\" --export-type=pdf --export-filename=\"{$pdfFullPath}\"";

        exec($command, $output, $resultCode);

        return $pdfFullPath;
    }
}
