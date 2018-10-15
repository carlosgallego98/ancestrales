<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\MateriaPrima::class, function (Faker $faker) {
    return [
      'nombre'=>$faker->company(),
      'cantidad'=>$faker->numberBetween(120,300),
      'nivel_minimo'=>$faker->numberBetween(1,100),
      'unidad'=>$faker->word(),
      'valor'=>$faker->randomFloat(3,1000,10000),
      'id_proveedor' => $faker->numberBetween(1,20),
      'es_material' => $faker->numberBetween(0,1),
    ];
});
