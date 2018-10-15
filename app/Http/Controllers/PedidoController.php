<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Proveedor;
use App\PedidoProveedor;
use Illuminate\Http\Request;
use App\Mail\PedidoProveedorMail;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido){
        //
    }

    public function datatable($tabla,$tipo = null){

        switch ($tabla) {
            case 'bebidas':

            //Pedidos de Bebidas

            break;

            case 'materiales':

            $pedidos_proveedor = PedidoProveedor::whereIdEstado(1)->get();

            return datatables()->of($pedidos_proveedor)
            ->addColumn('proveedor',function($pedido){
                return "<a href='#' >{$pedido->proveedor->nombre}</a>";
            })
            ->addColumn('material',function($pedido){
                return "<a href='#' ><b>{$pedido->material->nombre}</b></a>";
            })
            ->addColumn('estado',function($pedido){
                return $pedido->getEstado();
            })
            ->addcolumn('confirmar_pedido',function($pedido){
                return "<a href='autorizar/{$pedido->id}'><i class='fa fa-check'></i> Autorizar Pedido</a>";
            })
            ->removeColumn('id_estado','id_proveedor','id_material')
            ->rawColumns(['proveedor','material','confirmar_pedido'])
            ->editColumn('created_at',function($pedido){
                return "{$pedido->created_at->format('d-m-Y')}, {$pedido->created_at->format('H:i:s')} ";
            })
            ->editColumn('updated_at',function($pedido){
                return "{$pedido->updated_at->format('d-m-Y')}, {$pedido->created_at->format('H:i:s')} ";
            })->toJson();

            break;

            default:
                # code...
                break;
        }


        return datatables()->of($pedidos)
        ->editColumn('created_at',function($pedido){
            return $pedido->created_at->format('Y-m-d');
        })->toJson();
    }

    public function autorizar(PedidoProveedor $pedido_proveedor){


        // Se obtienen los datos del proveedor y el material de la orden
        $proveedor = $pedido_proveedor->proveedor;
        $material  = $pedido_proveedor->material;

        // Se envia un correo con el pedido al proveedor
        return new PedidoProveedorMail($proveedor,$material);

        // Se cambia el estado del pedido a confirmado
        $pedido_proveedor->id_estado = 2;

        return $pedido_proveedor;

        // Se regresa a la pagina principal

    }

    public function por_confirmar(){

        return view('admin.gerente.pedidos.confirmar');

    }

    public function en_camino(){

        return view('admin.gerente.pedidos.camino');

    }
}
