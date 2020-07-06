<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\AuthInterface',
            'App\Repositories\AuthRepository');

        $this->app->bind(
                'App\Repositories\Interfaces\CourseInterface',
                'App\Repositories\CourseRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
