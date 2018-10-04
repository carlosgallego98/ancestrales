<?php

use Illuminate\Database\Seeder;
use App\User;
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

                        $gerente = User::create([
                            'nombres' => 'Ana Cristina',
                            'apellidos' => 'Mena Lozano',
                            'cedula' => '1111817546',
                            'correo' => 'anacris@bebidascl.com',
                            'nombre_usuario' => 'gerenteCristina',
                            'genero' => 'f',
                            'fecha_nacimiento' => '1998-02-10',
                            'password' => Hash::make('gerentecl'),
                        ]);

                        // Roles
                        $role = Role::create(['name'=>'comprador']); 

                        $role = Role::create(['name'=>'gerente']);
                        $gerente->assignRole($role);
                        
                        $role = Role::create(['name'=>'produccion']);

                        $role = Role::create(['name'=>'despacho']);

                        $role = Role::create(['name'=>'proveedor']);

                        $role = Role::create(['name'=>'relaciones_publicas']);

                        $role = Role::create(['name'=>'trasnporte']);

    }
}
