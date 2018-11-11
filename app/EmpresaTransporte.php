<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaTransporte extends Model
{
    protected $table = "empresas_transporte";
    protected $fillable = [
        'nombre',
        'direccion',
        'correo',
        'numero_teléfono',
        'img_empresa'
    ];
}
