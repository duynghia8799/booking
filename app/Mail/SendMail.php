<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $dataSendMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataSendMail)
    {
        $this->dataSendMail = $dataSendMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Dịch vụ tâm sen')
                    ->view('email.index');
    }
}
