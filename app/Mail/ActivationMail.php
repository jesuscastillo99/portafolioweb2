<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $titulo;
    public $cuerpo;
    public $enlace;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titulo, $cuerpo, $enlace)
    {
        $this->titulo = $titulo;
        $this->cuerpo = $cuerpo;
        $this->enlace = $enlace;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('CORREO DEL SISTEMA DE ITABEC')->view('layouts.publicacioncreada');;
                    
    }
}







