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

    public function show($certificate): JsonResponse
    {
        return $this->response(new CertificateResource(Certificate::find($certificate)));
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
