<?php

namespace App\Http\Controllers;

use App\Mail\CertificateMail;
use App\Models\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Http\Resources\CertificateResource;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificateController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->response(CertificateResource::collection(Certificate::all()));
    }

    public function store(StoreCertificateRequest $request)
    {
        if (!User::where('email', $request->student_email)->exists()) {
            return $this->response(['Bunday student topilmadi']);
        }

        $certificate = Certificate::create($request->validated());

        Mail::to($certificate->student_email)->send(new CertificateMail($certificate));

        return response()->json(['message' => 'Certificate created and email sent!'], 201);
    }

    public function show($certificate)
    {
        return view('certificates.show', compact('certificate'));
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
