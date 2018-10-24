<?php

namespace App\Http\Controllers\Admin;

use App\PedidoProveedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlmacenamientoController extends Controller
{
    public function almacenamiento()
    {
        return view('admin.almacenamiento.panel');
    }

    public function modal_actualizar_inventario(Request $request)
    {
      $pedido = PedidoProveedor::whereCodigo($request->codigo)->firstOrFail();
      if ($pedido->id_estado == 3) {
        return redirect()->route('almacenamiento.actualizar',$pedido);
      }else{
        return redirect()->route('almacenamiento')->with('alert-error', "Este Pedido ya está completado o no se ha confirmado");
    }
    }

    public function actualizar_inventario(PedidoProveedor $pedido_proveedor)
    {
        return view('admin.almacenamiento.actualizar_material', compact('materiales','pedido_proveedor'));
    }
}
