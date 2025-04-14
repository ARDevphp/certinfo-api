<?php

namespace App\Services\Certificate;

use App\Actions\ConvertSvgToPdfAction;
use App\Repository\CertificateRepository;
use App\Repository\PhotoRepository;
use App\Repository\UserRepository;

class SvgToPdfService
{
    public function __construct(
        protected PhotoRepository $photoRepository,
        protected CertificateRepository $certificateRepository,
        protected ConvertSvgToPdfAction $convertSvgToPdfAction,
    ){
    }

    public function pdfDownload($certificateId)
    {
        $cert = $this->certificateRepository->findById($certificateId);
        $svgRelativePath = $this->photoRepository->findById($cert->file_path);

        $pdfRelativePath = 'public/certificatePdf/' . uniqid() . '.pdf';
        $pdfFullPath = storage_path("app/{$pdfRelativePath}");

        $this->convertSvgToPdfAction->convertPdf($svgRelativePath->path, $pdfFullPath);

        return $pdfFullPath;
    }
}
