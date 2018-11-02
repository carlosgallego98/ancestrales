<?php

use Illuminate\Database\Seeder;
use App\EstadoPedido;
use App\TipoPedido;

class EstadoPedidosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "Sin Autorizar";
        $estado_pedido->save();
    
        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "Sin Confirmar";
        $estado_pedido->save();

        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "Autorizado";
        $estado_pedido->save();
        
        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "Confirmado";
        $estado_pedido->save();
        
        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "Fabricando";
        $estado_pedido->save();
        
        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "Bodega";
        $estado_pedido->save();
        
        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "Enviado";
        $estado_pedido->save();
        
        $estado_pedido = new EstadoPedido();
        $estado_pedido->nombre = "Entregado";
        $estado_pedido->save();
    }
}