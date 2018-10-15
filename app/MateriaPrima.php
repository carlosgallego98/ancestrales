<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    protected $table = "materias_primas";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'cantidad',
        'nivel_minimo',
        'unidad',
        'valor',
        'id_proveedor'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function productos(){
    }

    public function proveedor(){
      return $this->belongsTo(Proveedor::class,'id_proveedor');
   }

   public function en_pedido(){
     return $this->hasOne(PedidoProveedor::class,'id_material');
   }
   
   }
