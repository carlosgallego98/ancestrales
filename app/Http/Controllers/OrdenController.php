<?php

namespace App\Http\Controllers;

use Session;
use App\Pedido;
use App\OrdenEntrega;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
  public function EntregarBebida(Pedido $pedido,OrdenEntrega $orden)
  {
    $pedido->id_estado = 6;
    $orden->delete();

    if ($pedido->save()) {
      Session::flash('message', 'Entrega Registrada.');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('almacenamiento');
    }
  }
}
