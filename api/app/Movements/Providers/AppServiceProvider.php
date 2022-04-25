<?php

namespace App\Movements\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Movements\Models\Repositories\MovementRepositoryInterface',
            'App\Movements\Models\Repositories\MovementRepository'
        );
    }
}
