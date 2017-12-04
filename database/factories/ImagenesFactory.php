<?php

use Faker\Generator as Faker;

$factory->define(App\Imagenes::class, function (Faker $faker) {
    return [
      'nombre' => $faker->paragraph(1),
      'tipo' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
      'producto' => $faker->biasedNumberBetween($min = 1, $max = 3, $function = 'sqrt'),
      'user_id' => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
    ];
});
