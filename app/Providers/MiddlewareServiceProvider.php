<?php

namespace App\Providers;

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class MiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(Router $router): void
    {
        // register RoleMiddleware
        $router->aliasMiddleware('role',RoleMiddleware::class);
    }
}
