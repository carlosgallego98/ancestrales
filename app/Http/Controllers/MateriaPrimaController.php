<?php

namespace App\Http\Controllers;

use App\MateriaPrima;
use App\Proveedor;
use Illuminate\Http\Request;

class MateriaPrimaController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index($tipo)
   {
      return View('admin.produccion.materia_prima',compact('tipo'));
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      $proveedores = Proveedor::all();
      return View('admin.produccion.materia_prima.create',compact('proveedores'));
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
   {
      $data = $request->toArray();
      MateriaPrima::create([
         'nombre'=> $data['nombre'],
         'cantidad'=> $data['cantidad'],
         'nivel_minimo' => $data['nivel_minimo'],
         'unidad' => $data['unidad'],
         'valor'=> $data['valor'],
         'es_material' => $data['tipo'],
         'id_proveedor'=> $data['proveedor'],
      ]);
      $request->session()->flash('alert-success',"Se han Registrado {$data['cantidad']} {$data['unidad']}(s) de {$data['nombre']}" );

      return redirect()->route('panel');
   }

   /**
   * Display the specified resource.
   *
   * @param  \App\MateriaPrima  $materiaPrima
   * @return \Illuminate\Http\Response
   */
   public function show(MateriaPrima $materiaPrima)
   {
      //
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\MateriaPrima  $materiaPrima
   * @return \Illuminate\Http\Response
   */
   public function edit(MateriaPrima $materiaPrima)
   {
      //
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\MateriaPrima  $materiaPrima
   * @return \Illuminate\Http\Response
   */
   public function update(Request $request, MateriaPrima $materiaPrima)
   {
      //
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  \App\MateriaPrima  $materiaPrima
   * @return \Illuminate\Http\Response
   */
   public function destroy(MateriaPrima $materiaPrima)
   {
      //
   }

   public function datatable($tipo)
   {
      $filtro = ($tipo == 'materiales') ? '1' : '0';
      $materia_prima = MateriaPrima::where('es_material','=',$filtro)
      ->select('nombre','cantidad','nivel_minimo','unidad','valor','id_proveedor','es_material','created_at','updated_at')
      ->get();

      return datatables()->of($materia_prima)
      ->editColumn('cantidad',function($materia_prima){
         return "{$materia_prima->cantidad} {$materia_prima->unidad}(s)";
      })
      ->editColumn('id_proveedor',function($materia_prima){
         return "{$materia_prima->proveedor->nombre}";
      })
      ->editColumn('valor',function($materia_prima){
         return "$ {$materia_prima->valor}";
      })->toJson();
   }
}
