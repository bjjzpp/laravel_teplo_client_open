<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class MailFaq extends Mailable
{
    use Queueable, SerializesModels;

    protected $fio;
    protected $email;
    protected $phone;
    protected $adress;
    protected $subject1; 
    protected $messages;
    protected $geoip;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fio, $email, $phone, $adress, $subject1, $messages, $geoip)
    {
        $this->fio = $fio;
        $this->email = $email;
        $this->phone = $phone;
        $this->adress = $adress;
        $this->subject1 = $subject1;
        $this->messages = $messages;
        $this->geoip = $geoip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.email.faq')
            ->with([
                'fio' => $this->fio,
                'email' => $this->email,
                'phone' => $this->phone,
                'adress' => $this->adress,
                'subject1' => $this->subject1,
                'messages' => $this->messages,
                'geoip' => $this->geoip,
                ])
            ->subject('Электронное обращение с сайта МП «Теплоснабжение» г.Обнинск');
    }
}
