<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Certificate\CertificateCreateService;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind( CertificateCreateService::class);
    }

    public function boot(): void
    {
    }
}
