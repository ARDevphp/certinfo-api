<?php

namespace App\Repository;

use App\Models\Certificate;

class CertificateRepository
{
    public function store(array $data): Certificate
    {
        return Certificate::create($data);
    }

    public function findById(int $certificateId): Certificate
    {
        return Certificate::where('id', $certificateId)->first();
    }
}
