<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;
use App\MateriaPrima;

class ProductoMateriaPrima extends Model
{
  protected $table = "producto_materia_prima";
  protected $fillable = ['producto_id','materia_prima_id'];

  public function producto()
  {
    return hasMany(Producto::class,'producto_id');
  }
  public function materia_prima()
  {
    return hasMany(MateriaPrima::class,'materia_prima_id');
  }
}
