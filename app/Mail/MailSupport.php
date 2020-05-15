<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class MailSupport extends Mailable
{
    use Queueable, SerializesModels;

    protected $messages;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messages)
    {
        $this->messages = $messages;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.email.support')
        ->with([
            'messages' => $this->messages
            ])
        ->subject('Автоответчик в ЛК сайта МП «Теплоснабжение» г.Обнинск');
    }
}
