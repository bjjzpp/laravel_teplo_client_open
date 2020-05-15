<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Auth;
use Session;
use App\Tchema;
use App\TchemaFile;

class AdminScheme extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminHomeScheme()
    {
        return view('admin.home.scheme.index')
            ->with('Tchema', Tchema::orderBy('id','desc')->paginate(12));
    }

    public function createAdminHomeScheme()
    {
        return view('admin.home.scheme.create');
    }

    public function editAdminHomeScheme($id)
    {
        return view('admin.home.scheme.edit')
            ->with('Tchema', Tchema::find($id));
    }

    public function storeAdminHomeScheme(Request $request)
    {
            $vRules = [
                'name_chema' => 'required'
            ];

            $vMessage =
            [
                'name_chema.required' => 'Поле "Описание" не может быть пустым.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);
            try {
                $a = new Tchema();
                $a->name_chema =  $request->name_chema;
                $a->save();
                Session::flash('success','Запись в бд добавлена!');
            return redirect()->route('admin.home.scheme.edit', ['id' => $a->id]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function updateAdminHomeScheme(Request $request, $id)
    {
            $vRules = [
                'name_chema' => 'required'
            ];

            $vMessage =
            [
                'name_chema.required' => 'Поле "Описание" не может быть пустым.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);
            try {
                $rco = Tchema::find($id);
                $rco->name_chema = $request->name_chema;
                $rco->save();
                Session::flash('success','Запись в бд обновлена!');
            return redirect()->route('admin.home.scheme');
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function deleteAdminHomeScheme($id)
    {
      try {
            $af =  TchemaFile::where('tchema_id', $id)->get();
            foreach($af as $AF) {
                Storage::disk('public')->delete($AF->fpatch);
            }
            TchemaFile::destroy($id);
            Tchema::destroy($id);
            Session::flash('success','Запись в бд удалена!');
        return redirect()->route('admin.home.scheme');
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }

    public function showFileAdminHomeScheme($id)
    {
        return view('admin.home.scheme.create_file')
            ->with('Tchema', Tchema::findOrFail($id));
    }

    public function storeFileAdminHomeScheme(Request $request)
    {
            $vRules = [
                'fname' => 'required',
                'fpatch' => 'required'
            ];

            $vMessage =
            [
                'fname.required' => 'Поле "Наименование" не может быть пустым.',
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
              $af = new TchemaFile();
              $af->tchema_id = $request->id_return;
              $af->fname = $request->fname;
              $af->fpatch = $filename;
              $af->save();
              Session::flash('success','Файл добавлен!');
          return redirect()->route('admin.home.scheme.edit', ['id' => $request->id_return]);
        } catch(Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function deleteFileAdminHomeScheme($id)
    {
      try {
            $af = TchemaFile::findOrFail($id);
            $af_id = $af->tchema_id;
            Storage::disk('public')->delete($af->fpatch);
            $af->delete();
            Session::flash('success','Файл удален!');
        return redirect()->route('admin.home.scheme.edit', ['id' => $af_id]);
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }
}
