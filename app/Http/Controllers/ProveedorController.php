<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\PedidoProveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }

    public function pedidos_datatable(){
        $pedidos_proveedor = PedidoProveedor::select('id_material','created_at','updated_at','id_estado')
        ->where('id_estado','2')
        ->orderBy('created_at')
        ->get();

        return datatables()->of($pedidos_proveedor)
        ->addColumn('material',function($pedido){
            return "<a href='#'>{$pedido->material->nombre}</a>";
        })
        ->addColumn('estado',function($pedido){
            return "<b>{$pedido->estado->nombre}</b>";
        })
        ->addColumn('accion',function($pedido){
            return "<a href='#'> <i class='fa fa-check'></i> Confirmar Pedido</a>";
        })
        ->rawColumns(['material','estado','accion'])
        ->toJson();
    }

    public function confirmar_pedido(PedidoProveedor $pedido){
        $pedido->id_estado=3
        $pedido->save();

        \Session::flash('alert-success', "Pedido de {$pedido->material->nombre} confirmado.");
        
        return redirect()->back(); 
    }

    public function materiales(){

    }

    public function datatable()
    {
        $users = User::join('model_has_roles','model_has_roles.model_id','=','users.id')
        ->join('roles','roles.id','=','model_has_roles.role_id')
        ->select('nombres','apellidos','direccion','email','cedula','users.created_at','roles.name')
        ->role('comprador')
        ->get();

        return datatables()->of($users)
        ->editColumn('created_at',function($user){
            return $user->created_at->format('Y-m-d');
        })->toJson();
    }
}
