<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class pedido extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($producto, $cantidad, $precio, $subtotal, $total, $mensaje)

    {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->subtotal = $subtotal;
        $this->total = $total;
        $this->mensaje = $mensaje;
    }

    public function build()

    {
        return $this->view('privada.mailpedido')->with([
                        'producto' => $this->producto,
                        'cantidad' => $this->cantidad,
                        'empresa' => $this->precio,
                        'subproducto' => $this->subtotal,
                        'total' => $this->total,
                        'mensaje' => $this->mensaje    
                        ]);

    }
}
