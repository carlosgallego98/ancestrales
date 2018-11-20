<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'id_usuario', 'id_producto', 'titulo', 'cuerpo'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }


    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
