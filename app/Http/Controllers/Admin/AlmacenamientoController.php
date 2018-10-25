<?php

namespace App\Http\Controllers\Admin;

use App\MateriaPrima;
use App\PedidoProveedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlmacenamientoController extends Controller
{
    public function almacenamiento()
    {
        $pedidos = PedidoProveedor::paginate(10);

        $count_materiales = count(MateriaPrima::all());
        $count_pedidos = count($pedidos);

        $materiales_criticos = MateriaPrima::whereRaw('cantidad = nivel_minimo')
        ->leftJoin('pedidos_proveedores', 'materias_primas.id', '=', 'pedidos_proveedores.id_material')
        ->leftJoin('proveedores', 'materias_primas.id_proveedor', '=', 'proveedores.id')
        ->select('cantidad', 'unidad', 'proveedores.nombre as nombre_proveedor', 'materias_primas.nombre')
        ->whereNull('pedidos_proveedores.created_at')
        ->get()
        ->take(5);

        return view('admin.almacenamiento.panel',
          compact(
            'pedidos',
            'count_materiales',
            'count_pedidos',
            'materiales_criticos'
        )
      );
    }

    public function pedidos_proveedor()
    {
        $materiales_criticos = MateriaPrima::whereRaw('cantidad = nivel_minimo')
        ->get();
        foreach ($materiales_criticos as $material) {
          $codigo = str_random(10);
          strtoupper($codigo);

          PedidoProveedor::create([
              'codigo'=> $codigo,
              'id_material'=> $material->id,
              'id_proveedor'=> $material->proveedor->id,
              'id_estado' => 1,
          ]);
      }
      return redirect()->route('panel');
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
