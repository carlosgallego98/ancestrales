<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesyPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // Reset cached roles and permissions
                app()['cache']->forget('spatie.permission.cache');

                // Permission::create(['name' => 'permiso a asignar']);
        
                // $role = Role::create(['name' => 'nombre del rol']);
                // $role->givePermissionTo('permiso a asignar al rol');

                // Permisos
                Permission::create(['name' => 'realizar pedidos']);

                // Roles
                $role = Role::create(['name'=>'comprador']);
                $role->givePermissionTo('realizar pedidos');

                $role = Role::create(['name'=>'produccion']);
                $role = Role::create(['name'=>'despacho']);
                $role = Role::create(['name'=>'proveedor']);
                $role = Role::create(['name'=>'relaciones_publicas']);
                $role = Role::create(['name'=>'trasnporte']);
    }
}