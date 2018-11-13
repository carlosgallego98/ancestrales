<?php

namespace App\Notifications;

use App\Envio;
use App\Pedido;
use App\Mail\PedidoEnviadoMail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Mail\Mailable;

class PedidoEnviado extends Notification
{
    use Queueable;
    protected $envio;
    protected $pedido;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido, Envio $envio)
    {
        $this->pedido = $pedido;
        $this->envio = $envio;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new PedidoEnviadoMail($this->pedido,$this->envio))->to($notifiable->email);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'empresa_transporte'=> $this->envio->empresa_transporte->nombre,
            'nombre_producto' => $this->pedido->producto->nombre,
            'numero_guia' => $this->envio->no_guia,
            'fecha_pedido' => $this->pedido->created_at,
            'valor_total'=> $this->pedido->valor * $this->pedido->cantidad,
            'url_pedido' => url(route('pedidos.detalles',$this->pedido))
        ];
    }
}
