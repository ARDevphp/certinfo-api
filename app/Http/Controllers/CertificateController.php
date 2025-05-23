<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Resources\CertificateResource;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Services\Certificate\CertificateShowService;
use App\Services\Certificate\CertificateUpdateService;
use App\Services\Certificate\CertificateCreateService;
use App\Services\Certificate\CertificateSearchService;
use App\Services\Certificate\CertificateDeleteService;

class CertificateController extends Controller
{

    public function __construct(
        protected CertificateShowService $certificateShowService,
        protected CertificateUpdateService $updateCertificateService,
        protected CertificateDeleteService $certificateDeleteService,
        protected CertificateCreateService $certificateCreateService,
        protected CertificateSearchService $certificateSearchServices,
    )
    {
    }

    public function index(): JsonResponse
    {
        try {
            $paginate = $this->certificateSearchServices->getCertificatesData();
            $formatPagination = $this->certificateSearchServices->formatPagination($paginate);

            return $this->success('Sertifikatlar ro‘yxati',  $formatPagination,200);

        } catch (\Exception $exception) {
            return $this->error('Certificate listda xatolik yuz berdi');
        }
    }

    public function store(StoreCertificateRequest $request)
    {
        $certificate = $this->certificateCreateService->createCertificate($request->validated());

        return $this->success('Student Yangi Certificate Yaratildi', ['id' => $certificate->id], 201);
    }

    public function show($certificate)
    {
        return $this->response(new CertificateResource($this->certificateShowService->showCertificate($certificate)), 200);
    }

    public function update(UpdateCertificateRequest $request, $id)
    {
        $certificate = $this->updateCertificateService->updateCertificate($request->validated(), $id);

        return $this->success('messageCertificate updated successfully!', ['id' => $certificate->id], 200);
    }

    public function destroy($certificate): JsonResponse
    {
        $this->certificateDeleteService->deleteCertificate($certificate);

        return $this->success('Certificate muvaffaqiyatli o\'chirildi!', code: 204);
    }
}
