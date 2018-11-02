<?php

namespace App\Http\Controllers;
use Auth;
use App\Pedido;
use App\EstadoPedido;
use App\Producto;
use Illuminate\Http\Request;
use App\Mail\ConfirmacionPedido;
use Illuminate\Support\Facades\Mail;

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
    public function create(Producto $bebida){
        return view('bebidas.realizar_pedido',compact("bebida"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->toArray();
        
        $codigo = str_random(6);
        
        if(Producto::find($data['id_bebida'])->enPedido()){
            return "ALTO";
        }else{         
            $pedido = Pedido::create([
                'codigo'      => $codigo,
                'cantidad'    => $data['cantidad'],
                'id_usuario'  => $data['id_comprador'],
                'id_producto' => $data['id_bebida'],
                'id_estado'   => 2,
            ]);
            $correo = new ConfirmacionPedido($pedido);
            Mail::to(Auth::user()->email)->send( $correo );
            return $correo; 
        }
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

    public function confirmar(Pedido $pedido){
        if(\Hash::check("h7pki2", '$2y$10$RGvtf/Y/7oR3BfBDvk4Vxuy6D.Y./bPJ/DhaG2pcJa7MT/dlpGQtK')){
            return "SI";
        }else{
            return "No";
        }
    }

    public function cancelar(Pedido $pedido){

    }

    public function datatable(){


    }
}
