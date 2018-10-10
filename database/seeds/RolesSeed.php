<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeed extends Seeder
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

      //Reset cached roles and permissions
      app()['cache']->forget('spatie.permission.cache');

      $ordenar_producto = Permission::create(['name' => 'realizar ordenes']);
      $modificar_perfil = Permission::create(['name' => 'modificar perfil']);
      $comentar_prodicto = Permission::create(['name' => 'comentar en producto']);

      $comprador = Role::create([
         'name'=>'comprador'
         ]);
    
      $comprador->givePermissionTo(
        $ordenar_producto,
        $modificar_perfil,
        $comentar_prodicto
      );
         
      $gerente = Role::create([
         'name'=>'gerente',
         'guard_name'=> 'empleado'
         ]);

      $produccion = Role::create([
         'name'=>'produccion',
         'guard_name'=> 'empleado'
         ]);

      $despacho = Role::create([
         'name'=>'despacho',
         'guard_name'=> 'empleado'
         ]);

      $proveedor = Role::create([
         'name'=>'proveedor',
         'guard_name'=> 'empleado'
         ]);

      $relaciones = Role::create(
         ['name'=>'relaciones_publicas',
         'guard_name'=> 'empleado'
         ]);
    }
}
