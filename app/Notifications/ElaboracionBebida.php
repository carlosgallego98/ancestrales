<?php

namespace App\Notifications;

use App\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ElaboracionBebida extends Notification
{
    use Queueable;
    protected $pedido;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
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
        return (new MailMessage)
                    ->subject("Comenzar elaboracion de Bebida")
                    ->line("El pedido de {$this->pedido->producto->nombre} ha sido confirmado, se debe comenzar con la elaboracion de la bebida.")
                    ->action('Detalles del Pedido', route('pedidos.bebidas.detalles',$this->pedido))
                    ->line("Una vez elaborada la bebida se debe especificar los materiales usados en la plataforma en la Opcion 'Registrar Elaboracion de Bebida'.");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
          'titulo'=> "{$this->pedido->producto->nombre}",
          'texto'=> 'Pedido Confirmado, comenzar elaboracion de la Bebida',
          'id_pedido' => $this->pedido->id,
          'url'=> route('pedidos.bebidas.detalles',$this->pedido)
        ];
    }
}
