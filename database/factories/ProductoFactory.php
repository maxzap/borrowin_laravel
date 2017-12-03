<?php
use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
      return [
      'nombre' => $faker->paragraph(1),
      'descripcion' => $faker->paragraph(2),
      'user_id' => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
      'estado_id' => $faker->biasedNumberBetween($min = 1, $max = 3, $function = 'sqrt'),
    ];
});
