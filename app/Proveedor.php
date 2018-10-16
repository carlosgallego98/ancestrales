<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Proveedor extends Authenticatable
{
   use Notifiable;
   use HasRoles;
   
   protected $guard_name = "proveedor";

   protected $table = "proveedores";

   protected $fillable = [
        'nombre',
        'direccion',
        'nit',
        'email',
        'password', 
        'img-proveedor',
    ];

    public function avatar(){
          $carpeta_personal = "usuario_{$this->id}_{$this->created_at->format('dmy')}";
          $foto_perfil = "storage/subidas/{$carpeta_personal}/foto_perfil/{$this->foto_perfil}";
  
          if (file_exists($foto_perfil)) {
              return "/{$foto_perfil}";
          }
           else {
              return '/img/default_avatar.jpg';
          }
      }
      public function rol(){
      return $this->getRoleNames();
    }
    public function pedidos()
    {
      return $this->hasMany(PedidoProveedor::class,'id_proveedor');
    }
}
