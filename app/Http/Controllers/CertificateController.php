<?php

namespace App\Http\Controllers;

use App\Http\Resources\CertificateResource;
use App\Models\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;

class CertificateController extends Controller
{
    public function index()
    {
        return $this->response(CertificateResource::collection(Certificate::all()));
    }

    public function store(StoreCertificateRequest $request)
    {
        Certificate::create([
            'student_name' => $request->student_name,
            'student_family' => $request->student_family,
            'student_email' => $request->student_email,
            'course_id' => $request->course_id,
            'practice' => $request->practice,
            'certificate_protection' => $request->certificate_protection,
            'finish_course' => $request->finish_course
        ]);

        return $this->response('qoshildi');
    }

    public function show(Certificate $certificate)
    {
        //
    }

    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        //
    }

    public function destroy(Certificate $certificate)
    {
        //
    }
}
