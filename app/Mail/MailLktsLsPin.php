<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class MailLktsLsPin extends Mailable
{
    use Queueable, SerializesModels;

    protected $ls;
    protected $pin;

    public function __construct($ls, $pin)
    {
        $this->ls = $ls;
        $this->pin = $pin;
    }

    public function build()
    {
        return $this->view('lkts.email.lktslspin')
            ->with([
                'ls' => $this->ls,
                'pin' => $this->pin
                ])
            ->subject('Активация Л/С на сайте МП Теплоснабжение г.Обнинск');
    }
}
