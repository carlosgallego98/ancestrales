<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
        protected $fillable = [
            'titulo',
            'cuerpo',
            'codigo',
            'limite_usuario',
            'fecha_vencimiento'
        ];

}
