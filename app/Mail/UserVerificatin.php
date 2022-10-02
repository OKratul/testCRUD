<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserVerificatin extends Mailable
{
    use Queueable, SerializesModels;

    public $verifyUrl;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Email.EmailVerify');
    }

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($registerUrl)
    {
        $this->verifyUrl= $registerUrl;
    }
}
