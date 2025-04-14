<?php

namespace App\Actions;

class ConvertSvgToPdfAction
{
    public function convertPdf(string $svgPath, string $pdfPath): void
    {
        $command = "inkscape \"{$svgPath}\" --export-type=pdf --export-filename=\"{$pdfPath}\"";

        exec($command, $output, $resultCode);
    }
}
