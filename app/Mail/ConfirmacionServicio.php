<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmacionServicio extends Mailable
{
    use Queueable, SerializesModels;
   
    var $objeto;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messege)
    {
        $this->objeto=$messege;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('carwash.system@gmail.com')
                ->view('mail.confirmacionservicio');
    }
}
