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
        
        $this->app->bind(
                'App\Repositories\Interfaces\ProgramInterface',
                'App\Repositories\ProgramRepository');

        $this->app->bind(
                'App\Repositories\Interfaces\StudentRegisterInterface',
                'App\Repositories\StudentRegisterRepository');
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
