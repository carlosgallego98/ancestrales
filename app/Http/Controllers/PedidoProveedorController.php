<?php

namespace App\Http\Controllers;

use App\PedidoProveedor;
use Illuminate\Http\Request;

class PedidoProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pedidos.proveedores');
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
     * @param  \App\PedidoProveedor  $pedidoProveedor
     * @return \Illuminate\Http\Response
     */
    public function show(PedidoProveedor $pedidoProveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PedidoProveedor  $pedidoProveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidoProveedor $pedidoProveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PedidoProveedor  $pedidoProveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PedidoProveedor $pedidoProveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PedidoProveedor  $pedidoProveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProveedor $pedidoProveedor)
    {
        //
    }

    public function autorizar()
    {

    }

    public function confirmar()
    {
        
    }

    public function datatable()
    {
        $pedidos_proveedor = PedidoProveedor::whereIdEstado(3)->get();

        return datatables()->of($pedidos_proveedor)
        ->addColumn('proveedor',function($pedido){
            return "<a href='#' >{$pedido->proveedor->nombre}</a>";
        })
        ->addColumn('material',function($pedido){
            return "<a href='#' ><b>{$pedido->material->nombre}</b></a>";
        })
        ->removeColumn('id_estado','id_proveedor','id_material')
        ->rawColumns(['proveedor','material'])
        ->editColumn('created_at',function($pedido){
            return "{$pedido->created_at->format('d-m-Y')}, {$pedido->created_at->format('H:i:s')} ";
        })
        ->editColumn('updated_at',function($pedido){
            return "{$pedido->updated_at->format('d-m-Y')}, {$pedido->created_at->format('H:i:s')} ";
        })->toJson();
    }
}
