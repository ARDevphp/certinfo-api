<?php

namespace App\Http\Controllers;

use App\Mail\CertificateMail;
use App\Models\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Http\Resources\CertificateResource;
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
        $certificate = Certificate::create($request->validated());

        $qrCode = QrCode::format('png')->size(200)->generate(route('certificates.show', $certificate->id));
        $pdf = Pdf::loadView('certificates.pdf', ['certificate' => $certificate, 'qrCode' => $qrCode])
            ->setPaper('A4', 'portrait');

        Mail::to($certificate->student_email)->send(new CertificateMail(['certificate' => $certificate, 'pdf' => $pdf->output()]));

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
