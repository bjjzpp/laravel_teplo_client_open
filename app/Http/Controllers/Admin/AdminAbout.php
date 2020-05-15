<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Auth;
use Session;
use App\About;

class AdminAbout extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminHomeAbout()
    {
        return view('admin.home.about.index')
            ->with('About', About::orderBy('id','asc')->paginate(16));
    }

    public function createAdminHomeAbout()
    {
        return view('admin.home.about.create');
    }

    public function editAdminHomeAbout($id)
    {
        return view('admin.home.about.edit')
            ->with('About', About::find($id));
    }

    public function updateAdminHomeAbout(Request $request, $id)
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
              $a = About::findOrFail($id);
              $a->title = $request->title;
              $a->full_text = $request->full_text;
              $a->save();
              Session::flash('success','Запись в бд обновлена!');
            return redirect()->route('admin.home.about');
          } catch(Exception $e) {
            Log::error($e->getMessage());
          }
    }

    public function storeAdminHomeAbout(Request $request)
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
                $a = new About();
                $a->title = $request->title;
                $a->full_text = $request->full_text;
                $a->save();
                Session::flash('success','Запись в бд добавлена!');
              return redirect()->route('admin.home.about');
          } catch(Exception $e) {
            Log::error($e->getMessage());
          }
    }

    public function deleteAdminHomeAbout($id)
    {
      try {
            $af = About::findOrFail($id);
            $af->delete();
            Session::flash('success','Запись в бд удалена!');
          return redirect()->route('admin.home.about');
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }
}
