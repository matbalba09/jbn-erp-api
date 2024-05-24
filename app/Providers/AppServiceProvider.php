<?php

namespace App\Providers;

use App\Repositories\Interface\IRoleRepository;
use App\Repositories\Interface\IUserRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            IUserRepository::class,
            UserRepository::class
        );
        $this->app->bind(
            IRoleRepository::class,
            RoleRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
