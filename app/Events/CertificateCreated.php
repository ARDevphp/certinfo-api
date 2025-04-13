<?php

namespace App\Events;

use App\Models\Certificate;
use App\Services\Certificate\CertificateCreateService;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CertificateCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Certificate $certificate)
    {
    }
}
