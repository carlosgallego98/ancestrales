<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Mail\PedidoProveedorMail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PedidoProveedorMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $proveedor;
    protected $nombre_material;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Proveedor $proveedor,\App\MateriaPrima $material)
    {
        $this->proveedor = $proveedor;
        $this->material = $material;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject("Nueva orden de Materia Prima")
        ->from("anacis@bebidascl.com")
        ->markdown('mails.pedidos.proveedor')
        ->with([
          'nombre_material'=> $this->material->nombre,
          'nombre_proveedor'=> $this->proveedor->nombre,
          'numero_pedidos'=> count($this->proveedor->pedidos)
        ]);
    }
}
