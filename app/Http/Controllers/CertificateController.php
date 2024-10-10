<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Http\Resources\CertificateResource;
use Illuminate\Http\JsonResponse;

class CertificateController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->response(CertificateResource::collection(Certificate::all()));
    }

    public function store(StoreCertificateRequest $request): JsonResponse
    {
        Certificate::create($request->validated());

        return $this->response(['message' => 'Certificate muvaffaqiyatli qo\'shildi!']);
    }

    public function show(Certificate $certificate): JsonResponse
    {
        return $this->response(new CertificateResource($certificate));
    }

    public function update(UpdateCertificateRequest $request, Certificate $certificate): JsonResponse
    {
        $certificate->update($request->validated());

        return $this->response(['message' => 'Certificate muvaffaqiyatli yangilandi!']);
    }

    public function destroy(Certificate $certificate): JsonResponse
    {
        $certificate->delete();

        return $this->response(['message' => 'Certificate muvaffaqiyatli o\'chirildi!']);
    }
}
