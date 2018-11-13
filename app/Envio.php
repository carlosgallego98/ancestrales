<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    protected $fillable = [
        'id_pedido',
        'id_empresa_transporte',
        'no_guia'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido', 'id');
    }

    public function empresa_transporte()
    {
        return $this->belongsTo(EmpresaTransporte::class, 'id_empresa_transporte', 'id');
    }

    public function estado_pedido()
    {
        return $this->pedido()->estado;
    }
}
