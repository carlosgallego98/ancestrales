<?php

use Illuminate\Database\Seeder;

class ProductosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = \Faker\Factory::create('es_MX');

         for ($e=0; $e < 30; $e++) {
          $producto = factory('App\Producto')->make();
          $producto->save();
          $ingredientes_producto = [
            $faker->numberBetween(1,10),
            $faker->numberBetween(10,30),
            $faker->numberBetween(1,10),
            $faker->numberBetween(30,50)
          ];
          $producto->materiales()->sync($ingredientes_producto);
      }
    }
}
