<?php

namespace App\PersonalRecords\Providers;

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
            'App\PersonalRecords\Models\Repositories\PersonalRecordRepositoryInterface',
            'App\PersonalRecords\Models\Repositories\PersonalRecordRepository'
        );
    }
}
