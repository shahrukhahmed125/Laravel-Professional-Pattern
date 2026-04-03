<?php

namespace App\Providers;

use App\Repositories\Eloquent\ProjectRepository;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        URL::forceScheme('https'); // forces all routes to HTTPS
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
