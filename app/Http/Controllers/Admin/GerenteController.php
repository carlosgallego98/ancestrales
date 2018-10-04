<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GerenteController extends Controller
{
    public function gerente()
    {
      return view('admin.gerente.panel');
    }

    public function estadisticas_ventas()
    {
      return view('admin.gerente.estadisticas.ventas');
    }

    public function estadisticas_pedidos()
    {
      return view('admin.gerente.estadisticas.pedidos');
    }
}
