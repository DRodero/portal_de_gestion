<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProyectoCreado extends Mailable
{
    use Queueable, SerializesModels;

    public $proyecto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($proyecto)
    {
        $this->proyecto = $proyecto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.proyecto-creado')->subject("Proyecto creado");
    }
}
