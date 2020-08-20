<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Wolf;
use Faker\Generator as Faker;

$factory->define(Wolf::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'gender' => $faker->randomElement(['male', 'female', 'other']),//TODO: enum?
        'birthdate' => $faker->dateTimeThisCentury()
    ];
});
