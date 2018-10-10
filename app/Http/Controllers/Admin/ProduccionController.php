<?php

namespace App\Http\Controllers\Admin;

use App\Pedido;
use App\MateriaPrima;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProduccionController extends Controller
{
   public function produccion(){
      $count_materiales = count(MateriaPrima::all());
      $count_pedidos = count(Pedido::all());
      $materiales_criticos = MateriaPrima::all();

      return view('admin.produccion.panel',
      compact(
         'count_materiales',
         'count_pedidos',
         'count_pedidos_pendientes',
         'materiales_criticos')
      );
   }
}
