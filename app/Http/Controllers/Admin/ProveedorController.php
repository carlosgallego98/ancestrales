<?php

namespace App\Http\Controllers\Admin;

use App\PedidoProveedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedorController extends Controller
{
    public function proveedor()
      {
      	$pedidos_proveedor = PedidoProveedor::whereidProveedor(auth('proveedor')->user()->id)
                                                    ->whereIdEstado(2,1,3)->get();
        return view('admin.proveedor.panel',compact('pedidos_proveedor'));
      }
}
