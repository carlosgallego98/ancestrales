<?php

use Faker\Generator as Faker;
use App\Pedido;

$factory->define(Pedido::class, function (Faker $faker) {
    return [
        'codigo' => str_random(6),
        'cantidad' => 1,
        'id_usuario' => 2,
        'id_producto' => $faker->numberBetween(1,25),
        'id_estado' => 4,
    ];
});
