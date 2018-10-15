<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
   protected $table = "proveedores";

    protected $fillable = [
        'nombre',
        'email',
        'direccion',
        'img-proveedor',
    ];

    public function pedidos()
    {
      return $this->hasMany(PedidoProveedor::class,'id_proveedor');
    }
}
