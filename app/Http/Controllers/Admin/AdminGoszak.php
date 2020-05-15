<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Auth;
use Session;
use App\Yeargoszak;
use App\Goszak;
use App\Fz223File;
use App\Fz;
use App\Typegoszak;
use App\GoszakType;
use App\SprEtorg;
use App\Fz223Contract;

class AdminGoszak extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminHomeGoszak()
    {
        return view('admin.home.goszak.index')
            ->with('FzPz', Goszak::where('goszak_types_id', 1)->orderBy('id','desc')->paginate(16))
            ->with('FzRk', Goszak::where('goszak_types_id', 12)->orderBy('id','desc')->paginate(16))
            ->with('FzRz', Goszak::where('goszak_types_id', 3)->orderBy('id','desc')->paginate(16))
            ->with('FzRo', Goszak::where('goszak_types_id', 4)->orderBy('id','desc')->paginate(16));
    }

    public function createAdminHomeGoszak()
    {
        return view('admin.home.goszak.create')
            ->with('SprEtorg', SprEtorg::orderBy('id','asc')->get())
            ->with('GoszakType', GoszakType::orderBy('id','asc')->get())
            ->with('Typegoszak', Typegoszak::orderBy('id','asc')->get())
            ->with('Fz', Fz::orderBy('id','desc')->get())
            ->with('Yeargoszak', Yeargoszak::orderBy('id','desc')->get());
    }

    public function editAdminHomeGoszak($id)
    {
        return view('admin.home.goszak.edit')
            ->with('Goszak', Goszak::find($id))
            ->with('SprEtorg', SprEtorg::orderBy('id','asc')->get())
            ->with('GoszakType', GoszakType::orderBy('id','asc')->get())
            ->with('Typegoszak', Typegoszak::orderBy('id','asc')->get())
            ->with('Fz', Fz::orderBy('id','desc')->get())
            ->with('Yeargoszak', Yeargoszak::orderBy('id','desc')->get());
    }

    public function storeAdminHomeGoszak(Request $request)
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
                $a = new Goszak();
                $a->typegoszak_id = $request->typegoszak_id;
                $a->goszak_types_id = $request->goszak_types_id;
                $a->year_id = $request->year_id;
                $a->etorg_id = $request->etorg_id;
                $a->numzak = $request->numzak;
                $a->etorg_num = $request->etorg_num;
                $a->ztext = $request->ztext;
                $a->databegin = \Carbon\Carbon::parse($request->databegin)->format('Y-m-d');
                $a->dataend = \Carbon\Carbon::parse($request->dataend)->format('Y-m-d');
                $a->datacomm = \Carbon\Carbon::parse($request->datacomm)->format('Y-m-d');
                $a->fz_id = $request->fz_id;
                $a->save();
                Session::flash('success','Запись в бд добавлена!');
            return redirect()->route('admin.home.goszak.edit', ['id' => $a->id]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function updateAdminHomeGoszak(Request $request, $id)
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
                $rco = Goszak::find($id);
                $rco->typegoszak_id = $request->typegoszak_id;
                $rco->goszak_types_id = $request->goszak_types_id;
                $rco->year_id = $request->year_id;
                $rco->etorg_id = $request->etorg_id;
                $rco->numzak = $request->numzak;
                $rco->etorg_num = $request->etorg_num;
                $rco->ztext = $request->ztext;
                $rco->databegin = \Carbon\Carbon::parse($request->databegin)->format('Y-m-d');
                $rco->dataend = \Carbon\Carbon::parse($request->dataend)->format('Y-m-d');
                $rco->datacomm = \Carbon\Carbon::parse($request->datacomm)->format('Y-m-d');
                $rco->fz_id = $request->fz_id;
                $rco->save();
                Session::flash('success','Запись в бд обновлена!');
            return redirect()->route('admin.home.goszak');
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function deleteAdminHomeGoszak($id)
    {
      try {
            $af =  Fz223File::where('goszak_id', $id)->get();
            foreach($af as $AF) {
                Storage::disk('public')->delete($AF->pfiles);
            }
            Goszak::destroy($id);
            Session::flash('success','Запись в бд удалена!');
        return redirect()->route('admin.home.goszak');
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }

    public function showFileAdminHomeGoszak($id)
    {
        return view('admin.home.goszak.create_file')
            ->with('Fz223File', Fz223File::findOrFail($id));
    }

    public function showDogAdminHomeGoszak($id)
    {
        return view('admin.home.goszak.create_dog')
            ->with('Fz', Fz::orderBy('id','desc')->get())
            ->with('Fz223Contract', Fz223Contract::findOrFail($id));
    }

    public function storeFileAdminHomeGoszak(Request $request)
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
              $af = new Fz223File();
              $af->goszak_id = $request->id_return;
              $af->nfiles = $request->nfiles;
              $af->pfiles = $filename;
              $af->oldfile = '1';
              $af->save();
              Session::flash('success','Файл добавлен!');
          return redirect()->route('admin.home.goszak.edit', ['id' => $request->id_return]);
        } catch(Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function deleteFileAdminHomeGoszak($id)
    {
      try {
            $af = Fz223File::findOrFail($id);
            $af_id = $af->goszak_id;
            Storage::disk('public')->delete($af->pfiles);
            $af->delete();
            Session::flash('success','Файл удален!');
        return redirect()->route('admin.home.goszak.edit', ['id' => $af_id]);
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }

    public function deleteDogAdminHomeGoszak($id)
    {
      try {
            $af = Fz223Contract::findOrFail($id);
            $af_id = $af->goszak_id;
            Fz223Contract::destroy($id);
            Session::flash('success','Запись о договоре в бд удалена!');
        return redirect()->route('admin.home.goszak.edit', ['id' => $af_id]);
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }

    public function storeDogAdminHomeGoszak(Request $request)
    {
            $vRules = [
                'lot' => 'required',
                'link_lot' => 'required'
            ];

            $vMessage =
            [
                'lot.required' => 'Поле "Наименование лота" не может быть пустым.',
                'link_lot.required' => 'Поле "Номер лота" не может быть пустым.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);
            try {
                $af = new Fz223Contract();
                $af->goszak_id = $request->id_return;
                $af->lot = $request-> lot;
                $af->link_lot = $request-> link_lot;
                $af->fz_id = $request->fz_id;
                $af->save();
                Session::flash('success','Запись о договре добавлена!');
            return redirect()->route('admin.home.goszak.edit', ['id' => $request->id_return]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }
}
