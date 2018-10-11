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
        $this->call(TipoEstadosSeed::class);

        factory('App\Proveedor',20)->create();
        factory('App\MateriaPrima', 10)->create();
    }
}
