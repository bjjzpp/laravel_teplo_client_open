<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Auth;
use Session;
use App\Abon;
use App\AbonFile;

class AdminAbon extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminHomeAbon()
    {
        return view('admin.home.abon.index')
            ->with('Abon', Abon::all());
    }

    public function createAdminHomeAbon()
    {
        return view('admin.home.abon.create');
    }

    public function editAdminHomeAbon($id)
    {
        return view('admin.home.abon.edit')
            ->with('Abon', Abon::findOrFail($id));
    }

    public function storeAdminHomeAbon(Request $request)
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
                  $a = new Abon();
                  $a->title = $request->title;
                  $a->full_text = $request->full_text;
                  $a->save();
                  Session::flash('success','Запись в бд добавлена!');
              return redirect()->route('admin.home.abon.edit', ['id' => $a->id]);
            } catch(Exception $e) {
                  Log::error($e->getMessage());
            }
    }

    public function updateAdminHomeAbon(Request $request, $id)
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
                  $a = Abon::findOrFail($id);
                  $a->title = $request->title;
                  $a->full_text = $request->full_text;
                  $a->save();
                  Session::flash('success','Запись в бд обновлена!');
              return redirect()->route('admin.home.abon');
            } catch(Exception $e) {
                Log::error($e->getMessage());
            }
    }

    public function deleteAdminHomeAbon($id)
    {
      try {
            Abon::destroy($id);
            $af =  AbonFile::where('abon_id', $id)->get();
            foreach($af as $AF) {
                Storage::disk('public')->delete($AF->pfiles);
            }
            Session::flash('success','Запись в бд удалена!');
        return redirect()->route('admin.home.abon');
      } catch(Exception $e) {
        Log::error($e->getMessage());
      }
    }

    public function showFileAdminHomeAbon($id)
    {
        return view('admin.home.abon.create_file')
            ->with('Abon', Abon::findOrFail($id));
    }

    public function storeFileAdminHomeAbon(Request $request)
    {
            $vRules = [
                'nfiles' => 'required',
                'pfiles' => 'required'
            ];
            $vMessage =
            [
                'nfiles.required' => 'Поле "Наименование" не может быть пустым.',
                'pfiles.required' => 'Файл не выбран.'
            ];
            $this->validate($request, $vRules, $vMessage);

            try {
                  $upfile = $request->file('pfiles');
                  $filename = time().'_'.$upfile->getClientOriginalName();
                  Storage::disk('public')->putFileAs(
                      '/',
                      $upfile,
                      $filename
                  );

                  $af = new AbonFile();
                  $af->abon_id = $request->id_return;
                  $af->nfiles =  $request->nfiles;
                  $af->pfiles = $filename;
                  $af->save();
                  Session::flash('success','Файл добавлен!');
              return redirect()->route('admin.home.abon.edit', ['id' => $request->id_return]);
            } catch(Exception $e) {
              Log::error($e->getMessage());
            }

         }

    public function deleteFileAdminHomeAbon($id)
    {
      try {
              $af = AbonFile::findOrFail($id);
              $af_id = $af->abon_id;
              Storage::disk('public')->delete($af->pfiles);
              $af->delete();
              Session::flash('success','Файл удален!');
              return redirect()->route('admin.home.abon.edit', ['id' => $af_id]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
        }
    }
}
