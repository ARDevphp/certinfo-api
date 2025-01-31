<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Certificate;
use App\Mail\CertificateMail;
use App\Notifications\CertificateCreatedNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use App\Services\CertificateService;
use Illuminate\Http\Request;
use App\Http\Resources\CertificateResource;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;

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
        $qrcodeSvgPath = $this->certificateService->generateQrCode($request->fullUrl() . 1);

        $combinedSvgPath = $this->certificateService
            ->mergeQrWithTemplate($qrcodeSvgPath, $request->student_name, $request->student_family);

        $post = Certificate::create([
            'student_name' => $request->student_name,
            'student_family' => $request->student_family,
            'student_email' => $request->student_email,
            'course_id' => $request->course_id,
            'file_path' => $combinedSvgPath,
            'practice' => $request->practice,
            'certificate_protection' => $request->certificate_protection,
            'finish_course' => $request->finish_course,
            'created_at' => now(),
        ]);

//        Notification::send(auth()->user(), new CertificateCreatedNotification($post));
//
//        $certificate = Certificate::findOrFail($certificateId);
//        Mail::to($request->student_email)->send(new CertificateMail($certificate));

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
