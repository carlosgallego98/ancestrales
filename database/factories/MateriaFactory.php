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
      'nombre'=>$faker->realText(10),
      'cantidad'=>$faker->numberBetween(1,300),
      'nivel_minimo'=>$faker->numberBetween(1,100),
      'unidad'=>$faker->realText(10),
      'valor'=>$faker->randomNumber(7),
    ];
});
