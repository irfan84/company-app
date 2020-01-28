<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => 'ABC Company',
        'phone' => '12345678',
//        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address
    ];
});

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'company_id' => $faker->numberBetween(1,10),
        'phone' => '09876543',
        'email' => $faker->unique()->safeEmail,
        'type' => 'Primary'
    ];
});
