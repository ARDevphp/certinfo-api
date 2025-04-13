<?php

namespace App\Providers;

use App\Services\Certificate\CertificateCreateService;
use App\Services\CertificateServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(CertificateServiceInterface::class, CertificateCreateService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
