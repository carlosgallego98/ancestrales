<?php

use Faker\Generator as Faker;
use App\Proveedor;

$factory->define(Proveedor::class, function (Faker $faker) {
    return [
      'nombre' => $faker->sentence(3,true),
      'email' => $faker->email(),
      'direccion' => $faker->address(),
    ];
});
