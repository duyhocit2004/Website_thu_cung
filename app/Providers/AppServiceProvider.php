<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Service\Auth\AuthService;
use App\Service\User\UserService;
use App\Service\User\IUserService;
use App\Service\Auth\IAuthService;
use App\Service\product\IproductService;
use App\Service\Product\ProductService;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(IAuthService::class, AuthService::class);
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IproductService::class, ProductService::class);
    }

    public function boot(): void
    {
        Paginator::useBootstrapThree();
    }
}
