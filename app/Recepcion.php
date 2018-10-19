<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recepcion extends Model
{
    protected $table = "recepciones";

    protected $fillable = [
      'id_material',
      'id_receptor',
      'cantidad',
      'firmado_por',
      'observacion']

    public function material()
    {
      return $this->hasOne(MateriaPrima::class,'id_material');
    }

    public function receptor()
    {
      return $this->hasOne(Empleado::class,'id_receptor');
    }
}
