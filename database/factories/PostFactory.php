<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
      'texto' => $faker->text($maxNbChars = 140),
      'likescant' => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
      'comentarioscant' => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
      'user_id' => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),

    ];
});
