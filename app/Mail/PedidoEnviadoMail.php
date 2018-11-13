<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Pedido;
use App\Envio;

class PedidoEnviadoMail extends Mailable
{
    use Queueable, SerializesModels;
    private $pedido;
    private $envio;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido, Envio $envio)
    {
      $this->pedido = $pedido;
      $this->envio = $envio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.pedidos.enviado')
            ->with([
                'empresa_transporte'=> $this->envio->empresa_transporte->nombre,
                'nombre_producto' => $this->pedido->producto->nombre,
                'numero_guia' => $this->envio->no_guia,
                'fecha_pedido' => $this->pedido->created_at,
                'valor_compra'=> $this->pedido->producto->precio * $this->pedido->cantidad,
                'url_pedido' => url(route('pedidos.detalles',$this->pedido))
            ]);
    }
}
