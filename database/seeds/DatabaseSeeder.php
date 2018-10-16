<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeed::class);
        $this->call(EmpleadosSeed::class);
        $this->call(EstadoPedidosSeed::class);

        factory('App\MateriaPrima', 20)->create();
    }
}
