<?php

namespace App\Providers;

use App\Services\Certificate\CertificateService;
use App\Services\CertificateServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(CertificateServiceInterface::class, CertificateService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
