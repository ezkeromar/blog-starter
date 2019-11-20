<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Offer;
use App\Models\Setor;
use Faker\Generator as Faker;
use App\User;
$factory->define(Offer::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'title' => $faker->text($maxNbChars = 20),
        'text' => $faker->text($maxNbChars = 300),
        'is_published' => true,
        'created_by' => User::all()->random()->id,
        'published_by' => User::all()->random()->id,
        'sector_id' => Sector::all()->random()->uuid
    ];
});
