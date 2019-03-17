<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt(str_random(10)), // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,10),
        'title' => $faker->sentence(7,11),
        'content' => $faker->paragraphs(rand(1,5), true),
    ];
});

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'project_id' => $faker->numberBetween(1,10),
        'title' => $faker->sentence(7,11),
        'content' => $faker->paragraphs(rand(1,5), true),
        'status' => $faker->boolean($chanceOfGettingTrue = 80),
    ];
});