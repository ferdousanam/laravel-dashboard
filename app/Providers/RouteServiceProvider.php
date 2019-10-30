<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $admin_namespace = 'App\Http\Controllers\BackEndCon';
    protected $dev_namespace = 'App\Http\Controllers\DevCon';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapCommandRoutes();

        $this->mapAdminRoutes();

        $this->mapDevRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "Command" routes for the application.
     *
     * Dev: Ferdous Anam
     *
     * @return void
     */
    protected function mapCommandRoutes()
    {
        Route::middleware('web')
             ->group(base_path('routes/cmd.php'));
    }

    /**
     * Define the "dev" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * Dev: Ferdous Anam
     *
     * @return void
     */
    protected function mapDevRoutes()
    {
        Route::prefix('')
             ->middleware('web')
             ->namespace($this->dev_namespace)
             ->group(base_path('routes/dev.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * Dev: Ferdous Anam
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::prefix('')
             ->middleware('web')
             ->namespace($this->admin_namespace)
             ->group(base_path('routes/admin.php'));
    }
}
