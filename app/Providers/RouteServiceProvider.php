<?php

namespace App\Providers;

use App\Models\Tenant;
use App\Enums\TenantStatusEnum;
use App\Services\DatabaseResolver;
use App\Services\RouteResolver;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            $host = request()->getHost();

            $tenant = Tenant::query()
                ->where('domain', $host)
                ->where('status', TenantStatusEnum::ACTIVE)
                ->first();

            if ($tenant) {

                app()->instance('tenant', $tenant);

                $routesFile = RouteResolver::routesPath();

                if (is_file($routesFile)) {
                    Route::middleware(['web'])
                        ->group($routesFile);
                }

                return;
            } else {
                Route::middleware('web')
                    ->group(base_path('routes/web.php'));
            }
        });
    }
}
