<?php

namespace App\Events;

use App\Models\Certificate;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CertificateCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Certificate $certificate)
    {
    }
}
