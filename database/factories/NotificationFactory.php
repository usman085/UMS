<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Application;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Application::class, function (Faker $faker) {
    return [
        'application_title' =>  $faker->sentence($nbWords = 6, $variableNbWords = true),
        'application_content' => $faker->text(),
        'user_id' => 2,
        'forward_to' => 5,  
        'status' => 'pending',
    ];
});
