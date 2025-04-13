<?php

namespace App\Http\Controllers;

use App\Services\Certificate\SvgToPdfService;

class PdfController extends Controller
{
    public function __construct(protected SvgToPdfService $svgToPdfServices)
    {
    }

    public function certPdfDownload($certificateId)
    {
        $pdfPath = $this->svgToPdfServices->pdfDownload($certificateId);

        return response()->download($pdfPath)->deleteFileAfterSend(true);
    }
}
