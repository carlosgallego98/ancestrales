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
                            'cedula' => '1111-817-546',
                            'correo' => 'anacris@bebidascl.com',
                            'nombre_usuario' => 'CristinaLozano',
                            'genero' => 'f',
                            'fecha_nacimiento' => '1998-02-10',
                            'password' => Hash::make('gerentecl'),
                            'email_verified_at' => date('Y-m-d'),
                        ]);

                         // Roles
                        $role = Role::create(['name'=>'comprador']);

                        $role = Role::create([
                            'name'=>'gerente',
                            'guard_name'=> 'empleado'
                            ]);
                        $gerente->assignRole($role);

                        $role = Role::create([
                            'name'=>'produccion',
                            'guard_name'=> 'empleado'
                            ]);

                        $role = Role::create([
                            'name'=>'despacho',
                            'guard_name'=> 'empleado'
                            ]);

                        $role = Role::create([
                            'name'=>'proveedor',
                            'guard_name'=> 'empleado'
                            ]);

                        $role = Role::create(
                            ['name'=>'relaciones_publicas',
                            'guard_name'=> 'empleado'
                            ]);

    }
}
