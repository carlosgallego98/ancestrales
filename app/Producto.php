<?php

namespace App;

use Auth;
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
    public function getImagenProducto($full = false){
      $carpeta = "storage/subidas/imagen_producto";
      $tamaño = ($full) ? "full_" : "mini_" ;
      $existe = \Storage::disk('imagen_productos')->exists("{$this->url}/{$tamaño}{$this->img_producto}");
      if ($existe) {
        return "{$carpeta}/{$this->url}/{$tamaño}{$this->img_producto}";
      }else{
        return "{$carpeta}/{$this->img_producto}";
      }

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
    public function enPedido(){
        return Pedido::
        where('id_usuario','=',Auth::user()->id)
      ->where('id_estado','!=',8)
      ->where('id_producto','=',$this->id)->exists();
    }
}
