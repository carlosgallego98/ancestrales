<?php

namespace App\Http\Controllers\Admin;

use App\Pedido;
use App\EmpresaTransporte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DespachoController extends Controller
{
    public function despacho()
    {
      $pedidos_listos = Pedido::whereIdEstado(6)
      ->latest()
      ->paginate(10);
      return view('admin.despacho.panel',compact('pedidos_listos'));
    }

    public function prepararEnvio(Pedido $pedido){
      $no_guia = rand(100000000,999999990);
      $empresas_transporte = EmpresaTransporte::all();
      return view('admin.despacho.preparar-envio',
             compact('pedido','no_guia','empresas_transporte'));
    }
}
