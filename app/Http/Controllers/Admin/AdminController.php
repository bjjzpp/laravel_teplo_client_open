<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Session;
use Artisan;
use App\SiteSetting;
use App\Page;
use App\SprBank;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminSetupSite($id)
    {
            $SiteSetting = SiteSetting::find($id);
            $SprBank = SprBank::all();
        return view('admin.setup.site', compact('SiteSetting', 'SprBank'));   
    }

    public function getAdminPagesEdit($id)
    {
            $Page = Page::find($id);
        return view('admin.pages.edit', compact('Page'));   
    }

    public function updateAdminSetupSite(Request $request, $id)
    {
            $vRules = [
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'metas' => 'required',
                'counts' => 'required',
                'copyright' => 'required'
            ];
            $vMessage =
            [
                'email.required' => 'Поле "Email" не может быть пустым.',
                'phone.required' => 'Поле "Телефон" не может быть пустым.',
                'address.required' => 'Поле "Адрес" не может быть пустым.',
                'metas.required' => 'Поле "Мета" не может быть пустым.',
                'counts.required' => 'Поле "Счетчики" не может быть пустым.',
                'copyright.required' => 'Поле "Копирайт" не может быть пустым.'
            ];
            $this->validate($request, $vRules, $vMessage);
            try {
                $ss = SiteSetting::find($id);
                $ss->email = $request->email;
                $ss->phone = $request->phone;
                $ss->address = $request->address;
                $ss->metas = $request->metas;
                $ss->counts = $request->counts;
                $ss->copyright = $request->copyright;
                $ss->save();
                Session::flash('success','Настройки обновлены!');
            return redirect()->route('lkts');
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function updateAdminPages(Request $request, $id)
    {
      try {
            $ss = Page::find($id);
            $ss->slime_text = $request->slime_text;
            $ss->full_text = $request->full_text;
            $ss->save();
            Session::flash('success','Данные обновлены!');
        return redirect()->route('lkts');
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }
}
