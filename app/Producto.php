<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
   
    protected $fillable = [
        'url','nombre','precio','descripcion'
    ];

    protected $hidden = [];

    public function getRouteKeyName(){
        return "url";
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

    public function envios(){
        return $this->hasMany(Envio::class);
    }

    public function materiales(){
      return $this->hasMany(MateriaPrima::class);
    }
}
