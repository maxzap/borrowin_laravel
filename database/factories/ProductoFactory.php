<?php
use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
      return [
      'nombre' => $faker->text($maxNbChars = 30),
      'descripcion' => $faker->paragraph(1),
      'user_id' => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
      'estado_id' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
    ];
});
