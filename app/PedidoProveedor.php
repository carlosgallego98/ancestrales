<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProveedor extends Model
{
    protected $table = "pedidos_proveedores";

    protected $fillable = [
        'id_material',
        'id_estado',
    ];

    public function material(){
        return $this->hasOne(MateriaPrima::class,'id_material');
    }
}
