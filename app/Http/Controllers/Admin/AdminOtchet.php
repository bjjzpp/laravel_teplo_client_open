<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Auth;
use Session;
use App\OtchetFile;
use App\OtchetGoszak;
use App\Yeargoszak;
use App\Fz;

class AdminOtchet extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminHomeOtchet()
    {
        return view('admin.home.fzotchet.index')
            ->with('OtchetGoszak', OtchetGoszak::orderBy('id','desc')->paginate(12));
    }

    public function createAdminHomeOtchet()
    {
        return view('admin.home.fzotchet.create')
            ->with('Fz', Fz::orderBy('id','asc')->get())
            ->with('Yeargoszak', Yeargoszak::orderBy('id','desc')->get());
    }

    public function editAdminHomeOtchet($id)
    {
        return view('admin.home.fzotchet.edit')
            ->with('OtchetGoszak', OtchetGoszak::find($id))
            ->with('Fz', Fz::orderBy('id','asc')->get())
            ->with('Yeargoszak', Yeargoszak::orderBy('id','desc')->get());
    }

    public function storeAdminHomeOtchet(Request $request)
    {
            $vRules = [
                'ztext' => 'required'
            ];

            $vMessage =
            [
                'ztext.required' => 'Поле "Описание" не может быть пустым.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);
            try {
                $a = new OtchetGoszak();
                $a->fz_id = $request->fz_id;
                $a->year_id = $request->year_id;
                $a->ztext =  $request->ztext;
                $a->save();
                Session::flash('success','Запись в бд добавлена!');
            return redirect()->route('admin.home.fzotchet.edit', ['id' => $a->id]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function updateAdminHomeOtchet(Request $request, $id)
    {
            $vRules = [
                'ztext' => 'required'
            ];

            $vMessage =
            [
                'ztext.required' => 'Поле "Описание" не может быть пустым.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);
            try {
                $rco = OtchetGoszak::find($id);
                $rco->fz_id = $request->fz_id;
                $rco->year_id = $request->year_id;
                $rco->ztext = $request->ztext;
                $rco->save();
                Session::flash('success','Запись в бд обновлена!');
            return redirect()->route('admin.home.fzotchet');
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function deleteAdminHomeOtchet($id)
    {
        try {
              $af =  OtchetFile::where('otchet_gz_id', $id)->get();
              foreach($af as $AF) {
                  Storage::disk('public')->delete($AF->fpatch);
              }
              OtchetGoszak::destroy($id);
              Session::flash('success','Запись в бд удалена!');
          return redirect()->route('admin.home.fzotchet');
        } catch(Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function showFileAdminHomeOtchet($id)
    {
        return view('admin.home.fzotchet.create_file')
            ->with('OtchetGoszak', OtchetGoszak::findOrFail($id));
    }

    public function storeFileAdminHomeOtchet(Request $request)
    {
            $vRules = [
                'fpatch' => 'required'
            ];

            $vMessage =
            [
                'fpatch.required' => 'Вы не выбрали файл.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);
            try {
                $upfile = $request->file('fpatch');
                $filename = time().'_'.$upfile->getClientOriginalName();
                Storage::disk('public')->putFileAs(
                    '/',
                    $upfile,
                    $filename
                );
                $af = new OtchetFile();
                $af->otchet_gz_id = $request->id_return;
                $af->fpatch = $filename;
                $af->oldfile = '0';
                $af->save();
                Session::flash('success','Файл добавлен!');
            return redirect()->route('admin.home.fzotchet.edit', ['id' => $request->id_return]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
         }

    public function deleteFileAdminHomeOtchet($id)
    {
      try {
            $af = OtchetFile::findOrFail($id);
            $af_id = $af->otchet_gz_id;
            Storage::disk('public')->delete($af->fpatch);
            $af->delete();
            Session::flash('success','Файл удален!');
        return redirect()->route('admin.home.fzotchet.edit', ['id' => $af_id]);
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }
}
