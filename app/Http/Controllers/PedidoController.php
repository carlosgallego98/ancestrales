<?php

namespace App\Http\Controllers;

use Auth;
use App\Pedido;
use App\Producto;
use App\Empleado;
use App\EstadoPedido;
use Illuminate\Http\Request;
use App\Mail\ConfirmacionPedido;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ElaboracionBebida;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        return View('admin.pedidos.bebidas');
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

            \Session::flash('message', 'Pedido Ralizado, mira tu correo electrónico');
            \Session::flash('alert-class', 'alert-success');
            return redirect()->route('inicio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido){
        return view('admin.pedidos.detalles',compact('pedido'));
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

    public function confirmar($pedido){
        $hash_link = explode('%',$pedido);
        $pedido = Pedido::whereCodigo($hash_link[1])->first();

        $url_hash =base64_decode(strtr($hash_link[0], '-_', '+/'));
        if(\Hash::check($hash_link[1],$url_hash)){
            if($pedido->id_estado == 2){
                $pedido->id_estado = 4;
                $pedido->save();

                $empleados_produccion = Empleado::role("produccion")->get();
                  foreach ($empleados_produccion as $user) {
                    $user->notify(new ElaboracionBebida($pedido));
                }

                \Session::flash('message', 'Pedido Confirmado!');
                \Session::flash('alert-class', 'alert-success');
                return redirect()->route('inicio');
            }else{
                \Session::flash('message', 'Este pedido ya se encuentra confirmado');
                \Session::flash('alert-class', 'alert-error');
                return redirect()->route('inicio');
            }
        }else{
            \Session::flash('message', 'URL No válida');
            \Session::flash('alert-class', 'alert-error');
            return redirect()->route('inicio');

        }
    }

    public function cancelar(Pedido $pedido){

    }

    public function datatable(){


    }
}
