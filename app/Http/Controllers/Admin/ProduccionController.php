<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Pedido;
use App\Proveedor;
use App\PedidoProveedor;
use App\MateriaPrima;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProduccionController extends Controller
{
  public function produccion()
  {
    $pedidos = Pedido::paginate(10);

    $count_materiales = count(MateriaPrima::all());
    $count_pedidos = count($pedidos);


    return view('admin.produccion.panel', compact('pedidos','count_materiales','count_pedidos'));
  }
}
