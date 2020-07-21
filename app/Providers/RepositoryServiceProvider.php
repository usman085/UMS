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
                'App\Repositories\Interfaces\ClassRoomInterface',
                'App\Repositories\ClassRoomRepository');
    
            $this->app->bind(
                'App\Repositories\Interfaces\TimeTableInterface',
                'App\Repositories\TimeTableRepository');

                $this->app->bind(
                    'App\Repositories\Interfaces\TimeTableDetailInterface',
                    'App\Repositories\TimeTableDetailRepository');

        $this->app->bind(
                'App\Repositories\Interfaces\CourseInterface',
                'App\Repositories\CourseRepository');
        
        $this->app->bind(
                'App\Repositories\Interfaces\ProgramInterface',
                'App\Repositories\ProgramRepository');

        $this->app->bind(
                'App\Repositories\Interfaces\StudentRegisterInterface',
                'App\Repositories\StudentRegisterRepository');
        
        $this->app->bind(
                'App\Repositories\Interfaces\ExamRoutineInterface',
                'App\Repositories\ExamRoutineRepository');
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
