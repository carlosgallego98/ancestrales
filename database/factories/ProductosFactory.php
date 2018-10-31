<?php

use Faker\Generator as Faker;
use App\Producto;

$factory->define(Producto::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence(3,true),
        'url'=> str_slug($faker->sentence(3,true),'-'),
        'precio' => $faker->randomNumber(5),
        'descripcion' => $faker->realText(300),
        'img_producto'=> 'bebidas-default.png',
    ];
});
