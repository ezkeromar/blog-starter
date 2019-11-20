<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\User;
use App\Models\sector;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'title' => $faker->text($maxNbChars = 20),
        'text' => $faker->text($maxNbChars = 300),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'is_published' => true,
        'created_by' => User::all()->random()->id,
        'published_by' => User::all()->random()->id,
        'sector_id' => sector::all()->random()->uuid
    ];
});
