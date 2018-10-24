<?php

use Illuminate\Database\Seeder;
use App\Empleado;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EmpleadosSeed extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
   // Permission::create(['name' => 'permiso a asignar']);
   // $role = Role::create(['name' => 'nombre del rol']);
   // $role->givePermissionTo('permiso a asignar al rol');

   // Reset cached roles and permissions
   app()['cache']->forget('spatie.permission.cache');

   $gerente = Empleado::create([
       'nombres' => 'Ana Cristina',
       'apellidos' => 'Mena Lozano',
       'cedula' => '1111817546',
       'email' => 'anacris@bebidascl.com',
       'nombre_usuario' => 'anacris',
       'genero' => 'f',
       'fecha_nacimiento' => '1998-02-10',
       'password' => '$2y$12$pIoh14cDGoGLQQXiHie2vex642lw/e1kMR3mc.VyWPY4pemOcZeOS',//gerentecl
       'email_verified_at' => date('Y-m-d'),
   ]);
   $gerente->assignRole(Role::find(2));

   $faker = \Faker\Factory::create('es_MX');
      for ($e=0; $e < 20; $e++) {
       $empleado = factory('App\Empleado')->make();
       $empleado->save();
       $empleado->assignRole(Role::find($faker->numberBetween(3,6)));
   }

      for ($e=0; $e < 20; $e++) {
       $empleado = factory('App\Proveedor')->make();
       $empleado->save();
       $empleado->assignRole(Role::find(7));
   }

}
}
