<?php

namespace App\Http\Controllers\Admin;

use Session;
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
    $pedidos = Pedido::whereIdEstado(4,2)
      ->latest()
      ->get()
      ->take(5);

    $count_materiales = count(MateriaPrima::all());
    $count_pedidos = count(Pedido::all());
    
    return view('admin.produccion.panel', compact('pedidos','count_materiales','count_pedidos'));
  }

  public function RedirectElaboracion(Request $request)
  {
    $pedido = Pedido::whereCodigo($request->codigo_pedido)->first();
    return redirect()->route('pedido.elaboracion',$pedido);
  }

  public function FormElaboracion(Pedido $pedido)
  {
    return view('admin.produccion.elaboracion',compact('pedido'));
  }

  public function ProductoElaborado(Pedido $pedido,Request $request)
  {
    $data = $request->toArray();
    $pedido->id_estado = 5;

    if($pedido->save()){

      foreach($pedido->producto->materiales as $material){

        $material->decrement('cantidad',$data[$material->id]);
        $material->save();      
      }

      Session::flash('message', 'Elaboracion registrada, Orden de entrega enviada.');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('produccion');

    }

  }
}
