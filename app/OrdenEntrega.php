<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdenEntrega extends Model
{
  use SoftDeletes;

  protected $table = 'ordenes_entrega';

  protected $fillable = [
      'id_pedido',
  ];

  public function pedido()
  {
    return $this->belongsTo(Pedido::class,'id_pedido');
  }
}
