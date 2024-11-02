<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MiCorreo extends Mailable
{
    use Queueable, SerializesModels;

    public $tarea;

    public function __construct($tarea)
    {
        $this->tarea = $tarea;

    }

    public function build()
    {
        return $this->view('emails.mi_email')
            ->subject('Asunto del Correo')
            ->with([
                'tarea' => $this->tarea,
            ]);
    }
}
