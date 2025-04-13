<?php

declare(strict_types=1);

namespace App\Services\Certificate;

use App\Models\Certificate;
use App\Repository\UserRepository;
use App\Repository\PhotoRepository;
use App\Repository\CourseRepository;
use App\Repository\PersonRepository;
use App\Repository\CertificateRepository;
use App\Actions\Certificate\CreateCertificateAction;

class CertificateCreateService
{
    public function __construct(
        protected UserRepository $userRepository,
        protected PhotoRepository $photoRepository,
        protected PersonRepository $personRepository,
        protected CourseRepository $courseRepository,
        protected CertificateRepository $certificateRepository,
        protected CertificateSvgService $certificateSvgService,
        protected CreateCertificateAction $createCertificateAction,
    ){
    }

    public function createCertificate(array $data): Certificate
    {
        $user = $this->userRepository->findByEmail($data['student_email']);
        $person = $this->personRepository->findByUserId($user->id);
        $course = $this->courseRepository->findCourseById($data['course_id']);
        $nextCertId = $this->certificateRepository->certificateMaxId();

        $combinedSvgPath = $this->certificateSvgService
            ->certificateSvg(
                $data['student_name'],
                $data['student_family'],
                $course->name,
                $data['current_url'],
                $nextCertId
            );

        $photo = $this->photoRepository->create($combinedSvgPath);

        return $this->createCertificateAction->execute([
            ...$data,
            'people_id' => $person->id,
            'course_id' => $course->id,
            'file_path' => $photo->id
        ]);
    }
}
