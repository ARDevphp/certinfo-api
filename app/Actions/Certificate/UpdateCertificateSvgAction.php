<?php

namespace App\Actions\Certificate;

use App\Models\Certificate;
use App\Repository\PhotoRepository;
use App\Repository\CourseRepository;
use App\Services\Certificate\CertificateSvgService;

class UpdateCertificateSvgAction
{
    public function __construct(
        protected PhotoRepository $photoRepository,
        protected CourseRepository $courseRepository,
        protected CertificateSvgService $certificateSvgService,
    ){
    }

    public function updateSvg(Certificate $certificate, array $data, int $nextCertId)
    {
        $course = $this->courseRepository->findCourseById($data['course_id']);
        $photo = $this->photoRepository->findById($certificate->file_path);

        if (file_exists($photo->path)) {
            unlink($photo->path);
        }

        $combinedSvgPath = $this->certificateSvgService
            ->certificateSvg(
                $data['student_name'],
                $data['student_family'],
                $course->name,
                $data['current_url'] ?? 'http://localhost:5173/certificates/', $nextCertId
            );

        $photo->update(['path' => $combinedSvgPath]);

        return $photo->id;
    }
}
