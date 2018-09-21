<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelefonoUsuario extends Model
{
    protected $table = 'numeros_telefonicos';
    
    protected $fillable = [
        'numero',
        'id_usuraio',
    ];

}
