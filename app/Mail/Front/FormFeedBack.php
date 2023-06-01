<?php

namespace App\Mail\Front;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormFeedBack extends Mailable
{
    use Queueable, SerializesModels;

    private  $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->messages = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('byweb.modules.mail.feedback')
            ->subject('Письмо с обратной связи сайта ByWeb')
            ->with(['messages' => $this->messages]);
    }
}
