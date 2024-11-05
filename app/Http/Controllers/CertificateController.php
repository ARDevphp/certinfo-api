<?php

namespace App\Http\Controllers;

use App\Mail\CertificateMail;
use App\Models\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Http\Resources\CertificateResource;
use App\Models\User;
use App\Services\CertificateService;
use App\Services\CertificateServiceInterface;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificateController extends Controller
{

    public function __construct(protected CertificateService $certificateService)
    {
    }

    public function index(): JsonResponse
    {
        return $this->response(CertificateResource::collection(Certificate::all()));
    }

    public function store(Request $request)
    {
        return  $request;
        if (!User::where('email', $request->student_email)->exists()) {
            return $this->response(['Bunday student topilmadi']);
        }

        $filePath = $this->certificateService->generateCertificate(
            $request->input('student_name'),
            $request->input('student_family'),
            $request->input('course_id'),
            $request->input('finish_course'),
        );

        $certificate = Certificate::create([
            'student_name' => $request->input('student_name'),
            'student_family' => $request->input('student_family'),
            'student_email' => $request->input('student_email'),
            'course_id' => $request->input('course_id'),
            'finish_course' => $request->input('finish_course'),
            'file_path' => $request->filePath,
        ]);


        Mail::to($certificate->student_email)->send(new CertificateMail($certificate));

        return response()->json(['message' => 'Certificate created and email sent!'], 201);
    }

    public function show($certificate)
    {
        return $this->response(new CertificateResource(Certificate::where('id', $certificate)->firstOrFail()));
    }

    public function update(UpdateCertificateRequest $request, $id): JsonResponse
    {
        $certificate = Certificate::find($id);
        $certificate->update($request->validated());

        return $this->response(['message' => 'Certificate muvaffaqiyatli yangilandi!']);
    }

    public function destroy($certificate): JsonResponse
    {
        Certificate::find($certificate)->delete();

        return $this->response(['message' => 'Certificate muvaffaqiyatli o\'chirildi!']);
    }
}
