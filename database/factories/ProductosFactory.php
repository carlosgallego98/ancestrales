<?php

use Faker\Generator as Faker;
use App\Producto;

$factory->define(Producto::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence(3,true),
        'precio' => $faker->randomNumber(6),
        'descripcion' => $faker->text(70),
        'id_proveedor' => $faker->numberBetween(1,20),
    ];
});
