<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Photo;
use App\Services\CertificateService;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController
{
    public function __construct(private CertificateService $certificateService)
    {
    }

    public function certPdfDownload($certificateId)
    {
        $imagePath = storage_path('app/public/certificatePhotos/certificate.png');

        $qr_code = $this->certificateService->generateQrCode('http://localhost:5173/certificates/2');

        $pdf = Pdf::loadView('certificates.pdf', ['imagePath' => $imagePath, 'qr_code' => $qr_code])->setPaper('a4', 'portrait');

        return $pdf->download('certificate.pdf');
    }

}
