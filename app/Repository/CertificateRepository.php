<?php

namespace App\Repository;

use App\Models\Certificate;

class CertificateRepository
{
    public function create(array $data): Certificate
    {
        return Certificate::create($data);
    }

    public function findById($certificateId): Certificate
    {
        return Certificate::where('id', $certificateId)->first();
    }

    public function certificateMaxId(): int
    {
        return Certificate::max('id') + 1;
    }
}
