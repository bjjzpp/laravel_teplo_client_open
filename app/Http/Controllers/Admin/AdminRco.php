<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Auth;
use Session;
use App\Rco;
use App\RcoFile;
use App\RcoMap;


class AdminRco extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminHomeRco()
    {
        return view('admin.home.rco.index')
            ->with('Rco', Rco::orderBy('id','desc')->paginate(16));
    }

    public function createAdminHomeRco()
    {
        return view('admin.home.rco.create');
    }

    public function editAdminHomeRco($id)
    {
        return view('admin.home.rco.edit')
            ->with('Rco', Rco::find($id));
    }

    public function storeAdminHomeRco(Request $request)
    {
            $vRules = [
                'title' => 'required'
            ];

            $vMessage =
            [
                'title.required' => 'Поле "Заголовок" не может быть пустым.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);
            try {
                $a = new Rco();
                $a->title = $request->title;
                $a->full_text = $request->full_text;
                if ($request->rso === 'yes') {
                    $a->rso = 1;
                } else {
                    $a->rso = 0;
                }
                if ($request->map === 'yes') {
                    $a->map = 1;
                } else {
                    $a->map = 0;
                }
                $a->save();
                Session::flash('success','Запись в бд добавлена!');
            return redirect()->route('admin.home.rco.edit', ['id' => $a->id]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function updateAdminHomeRco(Request $request, $id)
    {
            $vRules = [
                'title' => 'required'
            ];

            $vMessage =
            [
                'title.required' => 'Поле "Заголовок" не может быть пустым.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);
            try {
                $rco = Rco::find($id);
                $rco->title = $request->title;
                $rco->full_text = $request->full_text;
                $rco->save();
                Session::flash('success','Запись в бд добавлена!');
            return redirect()->route('admin.home.rco');
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function deleteAdminHomeRco($id)
    {
      try {
            Rco::destroy($id);
            $af =  RcoFile::where('rco_id', $id)->get();
            foreach($af as $AF) {
                Storage::disk('public')->delete($AF->pfiles);
            }
            Session::flash('success','Запись в бд удалена!');
        return redirect()->route('admin.home.rco');
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }

    public function showFileAdminHomeRco($id)
    {
        return view('admin.home.rco.create_file')
            ->with('Rco', Rco::findOrFail($id));
    }

    public function storeFileAdminHomeRco(Request $request)
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
                $af = new RcoFile();
                $af->rco_id = $request->id_return;
                $af->nfiles =  $request->nfiles;
                $af->pfiles = $filename;
                $af->save();
                Session::flash('success','Файл добавлен!');
            return redirect()->route('admin.home.rco.edit', ['id' => $request->id_return]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
         }

    public function deleteFileAdminHomeRco($id)
    {
      try {
            $af = RcoFile::findOrFail($id);
            $af_id = $af->rco_id;
            Storage::disk('public')->delete($af->pfiles);
            $af->delete();
            Session::flash('success','Файл удален!');
        return redirect()->route('admin.home.rco.edit', ['id' => $af_id]);
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }

    public function showMaspAdminHomeRco($id)
    {
        return view('admin.home.rco.frm')
            ->with('Rco', Rco::findOrFail($id));
    }

    public function storeAdminHomeRcoMap(Request $request)
    {
          $vRules = [
              'name' => 'required',
              'description' => 'required',
              'maps' => 'required',
              'dfiles' => 'required'
          ];

          $vMessage =
          [
              'name.required' => 'Поле "Наименование" не может быть пустым.',
              'description.required' => 'Поле "Описание" не может быть пустым.',
              'maps.required' => 'Поле "Координаты" не может быть пустым.',
              'dfiles.required' => 'Поле "Дата перехода дома" не может быть пустым.'
          ];
          //Validol
          $this->validate($request, $vRules, $vMessage);
          try {
              $ym = new RcoMap();
              $ym->rco_id = $request->id_return;
              $ym->name = $request->name;
              $ym->description  = strip_tags($request->description);
              $ym->maps  = $request->maps;
              $ym->dfiles = \Carbon\Carbon::parse($request->dfiles)->format('Y-m-d');
              $ym->save();
              Session::flash('success','Новые координаты добавлены!');
          return redirect()->route('admin.home.rco.edit', ['id' => $request->id_return]);
        } catch(Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function editAdminHomeRcoMap($id)
    {
        return view('admin.home.rco.frm_edit')
            ->with('RcoMap', RcoMap::findOrFail($id));
    }

    public function updateAdminHomeRcoMap(Request $request, $id)
    {
        $vRules = [
            'name' => 'required',
            'description' => 'required',
            'maps' => 'required',
            'dfiles' => 'required'
        ];

        $vMessage =
        [
            'name.required' => 'Поле "Наименование" не может быть пустым.',
            'description.required' => 'Поле "Описание" не может быть пустым.',
            'maps.required' => 'Поле "Координаты" не может быть пустым.',
            'dfiles.required' => 'Поле "Дата перехода дома" не может быть пустым.'
        ];
        //Validol
        $this->validate($request, $vRules, $vMessage);
            try {
                $rco = RcoMap::find($id);
                $rco->name = $request->name;
                $rco->description = strip_tags($request->description);
                $rco->maps = $request->maps;
                $rco->dfiles = \Carbon\Carbon::parse($request->dfiles)->format('Y-m-d');
                $rco->save();
                Session::flash('success','Координаты обновлены!');
            return redirect()->route('admin.home.rco.edit', ['id' => $request->id_return]);
        } catch(Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function deleteAdminHomeRcoMap($id)
    {
      try {
          $dym = RcoMap::findOrFail($id);
          $af_id = $dym->rco_id;
          RcoMap::destroy($id);
          Session::flash('success','Координаты удалены!');
        return redirect()->route('admin.home.rco.edit', ['id' => $af_id]);
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }
}
