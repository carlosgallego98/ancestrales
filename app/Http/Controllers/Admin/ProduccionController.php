<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Pedido;
use App\PedidoProveedor;
use App\MateriaPrima;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProduccionController extends Controller
{
   public function produccion(){
      $pedidos = Pedido::paginate(10);

      $count_materiales = count(MateriaPrima::all());
      $count_pedidos = count($pedidos);

      $materiales_criticos = MateriaPrima::whereRaw('cantidad = nivel_minimo')->limit(5)->get();

      return view('admin.produccion.panel',
      compact(
         'pedidos',
         'count_materiales',
         'count_pedidos',
         'materiales_criticos')
      );
   }

   public function pedidos_proveedor(){

    $materiales_criticos = MateriaPrima::whereRaw('cantidad = nivel_minimo')->get();

    foreach ($materiales_criticos as $material) {
        PedidoProveedor::create([
          'id_material'=> $material->id,
          'id_estado' => 1,
        ]);
    }
   }
}
