<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Auth;
use Session;
use App\FzPlan;
use App\PlanFile;
use App\Yeargoszak;

class AdminPlan extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminHomePlan()
    {
        return view('admin.home.fzplan.index')
            ->with('FzPlan', FzPlan::orderBy('id','desc')->paginate(16));
    }

    public function createAdminHomePlan()
    {
        return view('admin.home.fzplan.create')
            ->with('Yeargoszak', Yeargoszak::orderBy('id','desc')->get());
    }

    public function editAdminHomePlan($id)
    {
        return view('admin.home.fzplan.edit')
            ->with('FzPlan', FzPlan::find($id))
            ->with('Yeargoszak', Yeargoszak::orderBy('id','desc')->get());
    }

    public function storeAdminHomePlan(Request $request)
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
                $a = new FzPlan();
                $a->year_id = $request->year_id;
                $a->ztext =  $request->ztext;
                $a->save();
                Session::flash('success','Запись в бд добавлена!');
            return redirect()->route('admin.home.fzplan.edit', ['id' => $a->id]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function updateAdminHomePlan(Request $request, $id)
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
                $rco = FzPlan::find($id);
                $rco->year_id = $request->year_id;
                $rco->ztext = $request->ztext;
                $rco->save();
                Session::flash('success','Запись в бд обновлена!');
            return redirect()->route('admin.home.fzplan');
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function deleteAdminHomePlan($id)
    {
      try {
            $af =  PlanFile::where('fz_plan_id', $id)->get();
            foreach($af as $AF) {
                Storage::disk('public')->delete($AF->fpatch);
            }
            FzPlan::destroy($id);
            Session::flash('success','Запись в бд удалена!');
        return redirect()->route('admin.home.fzplan');
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }

    public function showFileAdminHomePlan($id)
    {
        return view('admin.home.fzplan.create_file')
            ->with('FzPlan', FzPlan::findOrFail($id));
    }

    public function storeFileAdminHomePlan(Request $request)
    {
            $vRules = [
                'nfiles' => 'required',
                'fpatch' => 'required'
            ];

            $vMessage =
            [
                'nfiles.required' => 'Поле "Наименование" не может быть пустым.',
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
                $af = new PlanFile();
                $af->fz_plan_id = $request->id_return;
                $af->nfiles =  $request->nfiles;
                $af->fpatch = $filename;
                $af->oldfile = '0';
                $af->save();
                Session::flash('success','Файл добавлен!');
            return redirect()->route('admin.home.fzplan.edit', ['id' => $request->id_return]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
         }

    public function deleteFileAdminHomePlan($id)
    {
      try {
            $af = PlanFile::findOrFail($id);
            $af_id = $af->fz_plan_id;
            Storage::disk('public')->delete($af->fpatch);
            $af->delete();
            Session::flash('success','Файл удален!');
        return redirect()->route('admin.home.fzplan.edit', ['id' => $af_id]);
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }
}
