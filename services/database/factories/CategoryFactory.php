<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\sector;
use Faker\Generator as Faker;

$factory->define(sector::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'title' => $faker->text($maxNbChars = 20),
        'description' => $faker->text($maxNbChars = 100)
    ];
});
