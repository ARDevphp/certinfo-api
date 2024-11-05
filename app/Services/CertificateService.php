<?php
namespace App\Services;

use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;
use Imagick;
use Carbon\Carbon;

class CertificateService
{
    public function generateCertificate($studentName, $studentLastname, $completionDate, $course_id)
    {
        $svgTemplate = file_get_contents(storage_path('app/public/certificateTemplate.svg'));

        $svgContent = str_replace('{{name}}', $studentName, $svgTemplate);
        $svgContent = str_replace('{{lastname}}', $studentLastname, $svgTemplate);
        $svgContent = str_replace('{{course}}', $course_id, $svgContent);
        $svgContent = str_replace('{{date}}', Carbon::parse($completionDate)->format('F j, Y'), $svgContent);

        $fileName = "{$studentName}_certificate.svg";
        $filePath = "certificates/{$fileName}";

        Storage::disk('public')->put($filePath, $svgContent);

        return $filePath;
    }

    public function convertSvgToPng($svgFilePath)
    {
        $svgPath = storage_path("app/public/{$svgFilePath}");
        $pngPath = str_replace('.svg', '.png', $svgPath);

        $imagick = new Imagick();
        $imagick->readImage($svgPath);
        $imagick->setImageFormat("png");
        $imagick->writeImage($pngPath);
        $imagick->clear();
        $imagick->destroy();

        return $pngPath;
    }
}
