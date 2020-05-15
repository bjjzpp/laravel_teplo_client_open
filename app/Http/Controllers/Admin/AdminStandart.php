<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Auth;
use Session;
use App\StandartBf;
use App\standartBfFile;
use App\StandartType;
use App\Yeargoszak;

class AdminStandart extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminHomeStandart()
    {
        return view('admin.home.standart.index')
            ->with('StandartBf', StandartBf::orderBy('id','desc')->paginate(16));
    }

    public function createAdminHomeStandart()
    {
        return view('admin.home.standart.create')
            ->with('StandartType', StandartType::all())
            ->with('Yeargoszak', Yeargoszak::orderBy('id','desc')->get());
    }

    public function editAdminHomeStandart($id)
    {
        return view('admin.home.standart.edit')
            ->with('StandartBf', StandartBf::find($id))
            ->with('StandartType', StandartType::all())
            ->with('Yeargoszak', Yeargoszak::orderBy('id','desc')->get());
    }

    public function storeAdminHomeStandart(Request $request)
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
                $a = new StandartBf();
                $a->standart_type_id = $request->standart_type_id;
                $a->year_id = $request->year_id;
                $a->ztext =  $request->ztext;
                $a->save();
                Session::flash('success','Запись в бд добавлена!');
            return redirect()->route('admin.home.standart.edit', ['id' => $a->id]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function updateAdminHomeStandart(Request $request, $id)
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
              $rco = StandartBf::find($id);
              $rco->standart_type_id = $request->standart_type_id;
              $rco->year_id = $request->year_id;
              $rco->ztext = $request->ztext;
              $rco->save();
              Session::flash('success','Запись в бд добавлена!');
          return redirect()->route('admin.home.standart');
        } catch(Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function deleteAdminHomeStandart($id)
    {
      try {
            StandartBf::destroy($id);
            $af =  standartBfFile::where('rco_id', $id)->get();
            foreach($af as $AF) {
                Storage::disk('public')->delete($AF->pfiles);
            }
            Session::flash('success','Запись в бд удалена!');
        return redirect()->route('admin.home.standart');
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }

    public function showFileAdminHomeStandart($id)
    {
        return view('admin.home.standart.create_file')
            ->with('StandartBf', StandartBf::findOrFail($id));
    }

    public function storeFileAdminHomeStandart(Request $request)
    {
            $vRules = [
                'nfiles' => 'required',
                'pfiles' => 'required'
            ];

            $vMessage =
            [
                'nfiles.required' => 'Поле "Наименование" не может быть пустым.',
                'pfiles.required' => 'Вы не выбрали файл.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);
            try {
                  $upfile = $request->file('pfiles');
                  $filename = time().'_'.$upfile->getClientOriginalName();
                  Storage::disk('public')->putFileAs(
                      '/',
                      $upfile,
                      $filename
                  );
                  $af = new standartBfFile();
                  $af->standart_bf_id = $request->id_return;
                  $af->nfiles =  $request->nfiles;
                  $af->pfiles = $filename;
                  $af->save();
                  Session::flash('success','Файл добавлен!');
              return redirect()->route('admin.home.standart.edit', ['id' => $request->id_return]);
            } catch(Exception $e) {
                Log::error($e->getMessage());
            }
         }

    public function deleteFileAdminHomeStandart($id)
    {
      try {
            $af = standartBfFile::findOrFail($id);
            $af_id = $af->standart_bf_id;
            Storage::disk('public')->delete($af->pfiles);
            $af->delete();
            Session::flash('success','Файл удален!');
        return redirect()->route('admin.home.standart.edit', ['id' => $af_id]);
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }
}
