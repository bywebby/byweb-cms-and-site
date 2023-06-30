<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailErrorSend extends Mailable
{
    use Queueable, SerializesModels;


    private $errorTxt;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($errorTxt)
    {

//        dd($errorTxt);

        $this->errorTxt = $errorTxt;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->view('view.name');
        return $this->view('admin.mail.error-send-mail')
            ->subject('Письмо с обратной связи c сайта ByWeb')
            ->with(['errorTxt' => $this->errorTxt]);
    }
}
