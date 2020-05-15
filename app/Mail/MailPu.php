<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class MailPu extends Mailable
{
    use Queueable, SerializesModels;

    protected $address;
    protected $phone;
    protected $pu_num1;
    protected $pu_num2;
    protected $pu_num3;
    protected $pu_num_data1;
    protected $pu_num_data2;
    protected $pu_num_data3;
    protected $geoip;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($address, $phone, $pu_num1, $pu_num2, $pu_num3, $pu_num_data1, $pu_num_data2, $pu_num_data3, $geoip)
    {
       $this->address = $address;
       $this->phone = $phone;
       $this->pu_num1 = $pu_num1;
       $this->pu_num2 = $pu_num2;
       $this->pu_num3 = $pu_num3;
       $this->pu_num_data1 = $pu_num_data1;
       $this->pu_num_data2 = $pu_num_data2;
       $this->pu_num_data3 = $pu_num_data3;
       $this->geoip = $geoip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.email.pu')->with([
           'address' => $this->address,
           'phone' => $this->phone,
           'pu_num1' => $this->pu_num1,
           'pu_num2' => $this->pu_num2,
           'pu_num3' => $this->pu_num3,
           'pu_num_data1' => $this->pu_num_data1,
           'pu_num_data2' => $this->pu_num_data2,
           'pu_num_data3' => $this->pu_num_data3,
           'geoip' => $this->geoip,
            ])
        ->subject('Отправка показаний с прибора учета с сайта МП «Теплоснабжение» г.Обнинск!');
    }
}
