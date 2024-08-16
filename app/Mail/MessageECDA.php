<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageECDA extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $data)
    {
        $this->data = $data;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $body = $this->data['message'];
        return $this->from('cadastreminierbf@gmail.com')
                    ->subject("Message du Cadastre Minier")
                    ->view('emails.message-google', compact('body'));

    }
}
