<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Auth;
use Session;
use Mail;
use App\User;
use App\LktsPm;
use App\Mail\MailLktsPm;

class AdminLktsPm extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminLktsPm()
    {
        return view('admin.lkts.pm.index')
            ->with('LktsPm', LktsPm::orderBy('id','desc')->paginate(12));
    }

    public function editAdminLktsPm($id)
    {
        return view('admin.lkts.pm.edit')
            ->with('LktsPm', LktsPm::find($id));
    }

    public function updateAdminLktsPm(Request $request, $id)
    {
              $vRules = [
                  'pm_out' => 'required'
              ];

              $vMessage =
              [
                  'pm_out.required' => 'Поле "Сообщение" не может быть пустым.'
              ];
              //Validol
            $this->validate($request, $vRules, $vMessage);
            try {
                $rco = LktsPm::find($id);
                $rco->pm_out = $request->pm_out;
                $rco->status = '1';
                $usend = User::find($rco->id_lkts_users);
                $messages = "Вам направлен ответ на личное сообщение в ЛК МП Теплоснабжение г.Обнинск от ".\Carbon\Carbon::parse($rco->pm_date_in)->format('d.m.Y').".";
                $rco->save();

                Mail::to($usend->email)
                    ->bcc(['kalva@obninsk.ru', 'pen07@obninsk.ru'])
                    ->send(new MailLktsPm($messages));
                Session::flash('success','Запись в бд обновлена! Уведомление отправлено!');
            return redirect()->route('admin.lkts.pm');
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function deleteAdminLktsPm($id)
    {
      try {
            LktsPm::destroy($id);
            Session::flash('success','Запись в бд удалена!');
        return redirect()->route('admin.lkts.pm');
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }
}
