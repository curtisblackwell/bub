<?php

use Faker\Generator as Faker;

$factory->define(App\Recipe::class, function (Faker $faker) {
    return [
        'name'         => $faker->words(rand(1, 3), true),
        'instructions' => $faker->paragraph,
        'image'        => $faker->imageUrl(),
    ];
});
