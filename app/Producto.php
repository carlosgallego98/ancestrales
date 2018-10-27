<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $fillable = [
        'url','img_producto','nombre','precio','descripcion'
    ];

    protected $hidden = [];

    public function getRouteKeyName(){
        return "url";
    }
    public function getImagenProducto(){
      $directorio = \Storage::disk('imagen_productos')->getAdapter()->getPathPrefix();
      return "{$directorio}{$this->img_producto}";
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
      return $this->belongsToMany(MateriaPrima::class);
    }
}
