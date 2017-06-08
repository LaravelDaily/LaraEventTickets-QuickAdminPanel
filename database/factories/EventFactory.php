<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->company,
        'description' => $faker->text,
        'start_time' => $faker->dateTime->format('Y-m-d H:i:s'),
        'venue' => $faker->address,
    ];
});
