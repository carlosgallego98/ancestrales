<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'id_usuario',
        'id_producto',
        'id_estado',
        'id_tipo',
    ];
    
    public function usuario(){
        return $this->hasOne(User::class,'id_usuario');
    }
    public function producto(){
        return $this->hasOne(Producto::class);
    }
    public function estado(){
        return $this->hasOne(EstadoPedido::class);
    }
    public function tipo(){
        return $this->hasOne(TipoPedido::class);
    }
}
