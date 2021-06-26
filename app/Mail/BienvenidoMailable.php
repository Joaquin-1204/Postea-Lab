<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BienvenidoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Bienvenido a nuevo usuario";
    
    public function __construct()
    {
        //
    }

    public function build()
    {
        return $this->view('emails.bienvenido');
    }
}
