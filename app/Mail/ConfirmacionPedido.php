<?php

namespace App\Mail;

use App\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmacionPedido extends Mailable
{
    use Queueable, SerializesModels;

    protected $pedido;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {  
        $hash_link = rtrim(strtr(base64_encode(\Hash::make($this->pedido->codigo)), '+/', '-_'), '=');

        return $this
        ->markdown('mails.pedidos.confirmacion_pedido')
        ->subject("Has realizado un nuevo Pedido")
        ->from("anacis@bebidascl.com")
        ->with([
            'nombre_producto'=> $this->pedido->producto->nombre,
            'nombre_comprador' => $this->pedido->comprador->nombre_completo(),
            'codigo_pedido' => "{$hash_link}_{$this->pedido->codigo}",
            'candidad_producto' => $this->pedido->cantidad,
        ]);
    }
}
