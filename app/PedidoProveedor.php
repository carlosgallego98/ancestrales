<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProveedor extends Model
{
    protected $table = "pedidos_proveedores";

    protected $fillable = [
        'codigo',
        'cantidad',
        'id_material',
        'id_proveedor',
        'id_estado',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    public function material(){
        return $this->belongsTo(MateriaPrima::class,'id_material','id');
    }
    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'id_proveedor','id');
    }
    public function estado(){
        return $this->belongsTo(EstadoPedido::class,'id_estado','id');
    }

    public function getEstado(){
        return $this->estado->nombre;
    }
    public function getNombreProveedor(){
        return $this->proveeedor->nombre;
    }
}
