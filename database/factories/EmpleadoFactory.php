<?php
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
$faker = \Faker\Factory::create('es_MX');
$factory->define(App\Empleado::class, function ($faker) {
    return [
      'nombres'=> $faker->firstName(),
      'apellidos'=> $faker->lastName(),
      'email' => $faker->unique()->safeEmail,
      'genero'=> $faker->randomLetter(),
      'cedula'=> $faker->isbn10,
      'fecha_nacimiento'=> $faker->date('Y-m-d'),
      'password'=> '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret,
      'remember_token' => str_random(10),
    ];

});
