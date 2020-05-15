<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Pay;
use App\SprBank;

class AdminPay extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminHomePay()
    {
        return view('admin.home.pay.index')
            ->with('Pay', Pay::all());
    }

    public function createAdminHomePay()
    {
        return view('admin.home.pay.create')
            ->with('SprBank', SprBank::all());
    }

    public function editAdminHomePay($id)
    {
        return view('admin.home.pay.edit')
            ->with('Pay', Pay::findOrFail($id))
            ->with('SprBank', SprBank::all());
    }

    public function storeAdminHomePay(Request $request)
    {
            $vRules = [
                'title' => 'required',
                'full_text' => 'required'
            ];

            $vMessage =
            [
                'title.required' => 'Поле "Заголовок" не может быть пустым.',
                'full_text.required' => 'Поле "Описание" не может быть пустым.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);

            try {
                  $a = new Pay();
                  $a->id_spr_bank = $request->id_spr_bank;
                  $a->title = $request->title;
                  $a->full_text = $request->full_text;
                  $a->save();
                  Session::flash('success','Запись в бд добавлена!');
              return redirect()->route('admin.home.pay.edit', ['id' => $a->id]);
            } catch(Exception $e) {
            }
    }

    public function updateAdminHomePay(Request $request, $id)
    {
            $vRules = [
                'title' => 'required',
                'full_text' => 'required'
            ];

            $vMessage =
            [
                'title.required' => 'Поле "Заголовок" не может быть пустым.',
                'full_text.required' => 'Поле "Описание" не может быть пустым.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);
            try{
                  $a = Pay::findOrFail($id);
                  $a->id_spr_bank = $request->id_spr_bank;
                  $a->title = $request->title;
                  $a->full_text = $request->full_text;
                  $a->save();
                  Session::flash('success','Запись в бд обновлена!');
              return redirect()->route('admin.home.pay');
            } catch(Exception $e) {

            }
    }

    public function deleteAdminHomePay($id)
    {
      try {
            Pay::destroy($id);
            Session::flash('success','Запись в бд удалена!');
        return redirect()->route('admin.home.pay');
      } catch(Exception $e) {
        
      }
    }
}