<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Photo;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController
{
    public function certPdfDownload($certificateId)
    {
        $certificate = Certificate::find($certificateId);
        $course = Course::find($certificate->course_id);
        $file_path = Photo::find($certificate->file_path);

        $svgPath = storage_path('app/public/certificatePhotos/' . basename($file_path->path));

        $certData = [
            'student_name' => $certificate->student_name,
            'student_family' => $certificate->student_family,
            'course_name' => $course->name,
            'file_path' => $svgPath
        ];

        $pdf = Pdf::loadView('certificates.pdf', $certData);

        return $pdf->download("certificate.pdf");
    }
}
