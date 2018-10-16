<?php

use Faker\Generator as Faker;
use App\Proveedor;

$factory->define(Proveedor::class, function (Faker $faker) {
    return [
      'nombre' => $faker->sentence(3,true),
      'email' => $faker->email(),
      'direccion' => $faker->address(),
      'nit'=> $faker->randomNumber(9),
      'password'=> '$2y$10$ST5g2WU4eu/x52UK97pFqe69xIhAUqeSkZbGafkcpRzgg.LyVTZYe', // proveedorcl,
      'remember_token' => str_random(10),
    ];
});
