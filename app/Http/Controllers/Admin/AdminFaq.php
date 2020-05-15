<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Auth;
use Session;
use App\PersonFaq;

class AdminFaq extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminHomeFaq()
    {
        return view('admin.home.faq.index')
            ->with('PersonFaq', PersonFaq::orderBy('id', 'desc')->paginate(7));
    }

    public function createAdminHomeFaq()
    {
        return view('admin.home.faq.create');
    }

    public function editAdminHomeFaq($id)
    {
        return view('admin.home.faq.edit')
            ->with('PersonFaq', PersonFaq::find($id));
    }

    public function updateAdminHomeFaq(Request $request, $id)
    {
        $vRules = [
            'faq_out_text' => 'required',
            'faq_out_ts' => 'required',
            'faq_out_date' => 'required'
        ];

        $vMessage =
        [
            'faq_out_text.required' => 'Поле "Описание" не может быть пустым.',
            'faq_out_ts.required' => 'Поле "Ответил" не может быть пустым.',
            'faq_out_date.required' => 'Поле "Дата ответа" не может быть пустым.'
        ];
        //Validol
        $this->validate($request, $vRules, $vMessage);
        try {
              if ($request->hasFile('faq_out_files')) {
                $upfile = $request->file('faq_out_files');
                $filename = time().'_'.$upfile->getClientOriginalName();
                Storage::disk('public')->putFileAs('/', $upfile, $filename);
              }
              $a = PersonFaq::findOrFail($id);
              $a->faq_out_date = \Carbon\Carbon::parse($request->faq_out_date)->format('Y-m-d');
              $a->faq_out_text = $request->faq_out_text;
              if(isset($filename)) {
                $a->faq_out_files = $filename;
              }
              $a->faq_out_ts = $request->faq_out_ts;
              $a->status = '1';
              $a->save();
              Session::flash('success','Запись в бд обновлена!');
          return redirect()->route('admin.home.faq');
        } catch(Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function deleteAdminHomeFaq($id)
    {
      try {
            $af = PersonFaq::findOrFail($id);
            $af->delete();
            Session::flash('success','Запись в бд удалена!');
        return redirect()->route('admin.home.faq');
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }
}
