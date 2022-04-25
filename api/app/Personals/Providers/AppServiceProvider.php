<?php

namespace App\Personals\Providers;

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
            'App\Personals\Models\Repositories\PersonalRepositoryInterface',
            'App\Personals\Models\Repositories\PersonalRepository'
        );
    }
}
