<?php

use Illuminate\Database\Seeder;
use App\EstadoPedido;
use App\TipoPedido;

class TipoEstadosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado_pedido = new EstadoPedido();

        $estado_pedido->nombre = "sin confirmar";
        $estado_pedido->save();
        
        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "confirmado";
        $estado_pedido->save();
        
        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "fabricando";
        $estado_pedido->save();
        
        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "fabricado";
        $estado_pedido->save();
        
        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "en bodega";
        $estado_pedido->save();
        
        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "enviado";
        $estado_pedido->save();
        
        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "entregado";
        $estado_pedido->save();

        $tipo_pedido = new TipoPedido();

        $tipo_pedido->nombre = "regular";
        $tipo_pedido->save();

        $tipo_pedido = new TipoPedido();
        $tipo_pedido->nombre = "materiales";
        $tipo_pedido->save();
    }
}