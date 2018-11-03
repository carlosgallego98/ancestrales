<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'codigo',
        'cantidad',
        'id_usuario',
        'id_producto',
        'id_estado',
    ];

    protected $dates = ['deleted_at'];

    public function getRouteKeyName(){
      return "codigo";
    }

    public function comprador(){
        return $this->belongsTo(User::class,'id_usuario');
    }
    public function producto(){
        return $this->belongsTo(Producto::class,'id_producto');
    }
    public function estado(){
        return $this->hasOne(EstadoPedido::class,'id','id_estado');
    }
}
