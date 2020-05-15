<?php

namespace App\Mail;


use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Helpers\pen07\ImgFile;
use App\LktsLsPuOtData;
use DB;

class MailLktsPu extends Mailable
{
    use Queueable, SerializesModels;

    protected $fio; 
    protected $email; 
    protected $ls; 
    protected $street; 
    protected $office; 
    protected $red;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(/*$fio, $email, $ls, $street, $office,*/ $red, $red_ls)
    {
        /*$this->fio = $fio; 
        $this->email = $email; 
        $this->ls = $ls;
        $this->street = $street; 
        $this->office = $office;*/
        $this->red = $red;
        $this->red_ls = $red_ls;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdate = ImgFile::getDateRussian();
        $send_db_lkts = DB::select('select lkts_ls.lastname as lastname, lkts_ls.firstname as firstname, lkts_ls.middlename as middlename, lkts_ls.ls as ls, lkts_ls.office as office, rco_maps.name as street, users.email as email  from lkts_ls, rco_maps, users  where lkts_ls.id_maps = rco_maps.id and lkts_ls.id_lkts_users = users.id and  lkts_ls.id = :id', ['id' => $this->red_ls]);
        $send_db_pu = DB::select('select lkts_ls_pus.namepu as namepu, lkts_ls_pus.numberpu as numberpu, lkts_ls_pu_ot_datas.pu_data as pu_data, lkts_ls_puots.created_at as created_at from lkts_ls_pu_ot_datas, lkts_ls_puots, lkts_ls_pus  where lkts_ls_pu_ot_datas.id_lkts_ls_pus = lkts_ls_pus.id and  lkts_ls_pu_ot_datas.id_lkts_ls_puots = lkts_ls_puots.id  and lkts_ls_pu_ot_datas.id_lkts_ls_puots = :id', ['id' => $this->red]);
        $send_db_pu_m =  DB::select('select title from lkts_ls_puots where id = :id', ['id' => $this->red]);

       return $this->view('lkts.email.lktspu')->with([
            'send_db_pu' => $send_db_pu,
            'send_db_pu_m' => $send_db_pu_m,
            'send_db_lkts' => $send_db_lkts
             ])
         ->subject('Отправка показаний с прибора учета '.$pdate.'!');
    }
}
