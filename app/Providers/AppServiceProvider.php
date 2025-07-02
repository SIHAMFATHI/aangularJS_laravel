<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router; // ✅ Add this
use App\Http\Middleware\RoleMiddleware;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    // ✅ Inject Router here
    public function boot(Router $router): void
    {
        // ✅ Alias your middleware
        $router->aliasMiddleware('role', RoleMiddleware::class);

        // Optional: if you're manually loading routes
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }
}
