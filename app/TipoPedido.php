<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPedido extends Model
{
    protected $fillable = ['nombre'];

    public function comentarios(){
        return $this->hasMany(Pedido::class);
    }
}
