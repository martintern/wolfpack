<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pack;
use Faker\Generator as Faker;

$factory->define(Pack::class, function (Faker $faker) {
    return [
        'name' => $faker->company
    ];
});
