<?php

use Faker\Generator as Faker;

$factory->define(App\Usuarioperfil::class, function (Faker $faker) {
  $usuario = factory(App\User::class)->create();
  $filePath = storage_path('images');
    return [
          'nombre' => $faker->name,
          'genero' => $faker->biasedNumberBetween($min = 1, $max = 10, $function = 'sqrt'),
          'fechacumpleano' => $faker->date($format = 'Y-m-d', $max = 'now'),
          'locationlat' => $faker->latitude($min = -90, $max = 90),
          'locationlon' => $faker->longitude($min = -180, $max = 180),
          'about' => $faker->text($maxNbChars = 140),
          'userpic' => 'test_user',
          // 'userpic' => $faker->image($filePath, 200, 150),
          'seguidos' => $faker->biasedNumberBetween($min = 10, $max = 80, $function = 'sqrt'),
          'postlikes' => $faker->biasedNumberBetween($min = 10, $max = 100, $function = 'sqrt'),
          'user_id' => $usuario->id,
          'edad' => $faker->randomDigitNotNull,
          'pais' => $faker->country,
    ];
});
