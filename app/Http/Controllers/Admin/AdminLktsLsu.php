<?php

namespace App\Http\Controllers\Admin;

use DB;
use Mail;
use Auth;
use Session;
use PDF;
use Date\DateFormat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Helpers\pen07\ImgFile;
use App\LktsLs;
use App\RcoMap;
use App\LktsLsCharge;
use App\LktsLsPuot;
use App\LktsLsPu;
use App\LktsLsPuFile;
use App\LktsLsPuOtData;
use App\Mail\MailLktsPu;
use App\SprBank;
use App\SiteSetting;
use App\User;

class AdminLktsLsu extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminLktsLsu() {
           $RcoMap = DB::select(DB::raw("SELECT distinct
                                            rco_maps.id as rcomid,
                                            rco_maps.name as street_house,
                                            lkts_ls.ticket_ver as ticket_ver
                                        FROM
                                            lkts_ls, 
                                            rco_maps
                                        WHERE 
                                            lkts_ls.id_maps = rco_maps.id and 
                                            lkts_ls.id_maps <> 0"
            ));
        return view('admin.lkts.lsu.index', compact('RcoMap'));
    }

    public function getAdminLktsLsuShow($id)
    {
            $LktsLs = LktsLs::where('id_maps', $id)->get();
            $RcoMap = RcoMap::findOrFail($id);
            $Street = $RcoMap->name;
        return view('admin.lkts.lsu.show', compact('LktsLs', 'Street'));
    }

    public function getAdminLktsLsuEdit($id)
    {
        $q1 = LktsLs::findOrFail($id);
            return view('admin.lkts.lsu.edit')
                    ->with('LktsLs', LktsLs::findOrFail($id))
                    ->with('User', User::findOrFail($q1->id_lkts_users))
                    ->with('LktsLsCharge', LktsLsCharge::where('id_lkts_ls', $id)->orderBy('id','desc')->get())
                    ->with('LktsLsPuot', LktsLsPuot::where('id_lkts_ls', $id)->orderBy('id','asc')->get())
                    ->with('RcoMap', RcoMap::where('flag_pd','0')->orderBy('name','asc')->get());      
    }

    public function getAdminLktsLsuPuCreate($id)
    {
        return view('admin.lkts.lsu.createpu')
            ->with('LktsLs', LktsLs::findOrFail($id));
    }

    public function storeLsPu(Request $request)
    {
        $vRules = [
            'namepu' => 'required',
            'numberpu' => 'required',
            'dizg' => 'required'
        ];

        $vMessage =
        [
            'namepu.required' => 'Поле "Наименование ПУ" не может быть пустым.',
            'numberpu.required' => 'Поле "Номер ПУ" не может быть пустым.',
            'dizg.required' => 'Поле "Дата выпуска ПУ" не может быть пустым.'
        ];
        //Validol
        $this->validate($request, $vRules, $vMessage);
         try {
                $id = LktsLsPu::create([
                    'id_lkts_ls' => $request->id_return,
                    'namepu'	=> $request->namepu,
                    'numberpu' => $request->numberpu,
                    'dizg' => \Carbon\Carbon::parse($request->dizg)->format('Y-m-d')
                ]);
                $ls = LktsLs::findOrFail($request->id_return);
                $id->save();
                Session::flash('success', 'Запись в бд добавлена!');
            return redirect()->route('admin.lkts.lsu.edit', ['id' => $request->id_return]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function storeLsPuUpdate(Request $request, $id)
    {
       $vRules = [
            'namepu' => 'required',
            'numberpu' => 'required',
            'dizg' => 'required'
        ];

        $vMessage =
        [
            'namepu.required' => 'Поле "Наименование ПУ" не может быть пустым.',
            'numberpu.required' => 'Поле "Номер ПУ" не может быть пустым.',
            'dizg.required' => 'Поле "Дата выпуска ПУ" не может быть пустым.'
        ];
        //Validol
        $this->validate($request, $vRules, $vMessage);
        try {
            $rco1 = LktsLsPu::findOrFail($id);
            $rco1->namepu = $request->namepu;
            $rco1->numberpu = $request->numberpu;
            $rco1->dizg = \Carbon\Carbon::parse($request->dizg)->format('Y-m-d');
            $rco1->save();
            Session::flash('success','Запись в бд обновлена!');
            return redirect()->route('admin.lkts.lsu.edit', ['id' => $request->id_return]);
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }

    public function getLsUPuEdit($id)
    {
            $q1 = LktsLsPu::findOrFail($id);
        return view('admin.lkts.lsu.edit_pu')
                ->with('LktsLs', LktsLsPu::findOrFail($id))
                ->with('LktsLsAdd', LktsLs::findOrFail($q1->id_lkts_ls));
    }

    public function getLsuPuFile($id)
    {
        return view('admin.lkts.lsu.loadfilepu', compact('id'));
    }


    public function storeLsPuFile(Request $request)
    {
        $vRules = [
            'nfiles' => 'required',
            'pfiles' => 'required',
            'defiles' => 'required'
        ];

        $vMessage =
        [
            'nfiles.required' => 'Поле "Наименование файла" не может быть пустым.',
            'pfiles.required' => 'Вы не выбрали Файл.',
            'defiles.required' => 'Поле "Дата подписания акта" не может быть пустым.'
        ];
        //Validol
        $this->validate($request, $vRules, $vMessage);
         try {
                $upfile = $request->file('pfiles');
                $filename = $upfile->getClientOriginalName();
                Storage::disk('public')->putFileAs(
                    '/',
                    $upfile,
                    $filename
                );
                $id = LktsLsPuFile::create([
                    'id_lkts_ls_pus' => $request->id_return,
                    'nfiles'	=> $request->nfiles,
                    'pfiles' => $filename,
                    'defiles' => \Carbon\Carbon::parse($request->defiles)->format('Y-m-d')
                ]);
                $id->save();
                Session::flash('success', 'Запись в бд добавлена!');
            return redirect()->route('admin.lkts.lsu.edit_pu', ['id' => $request->id_return]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function getLsUsersPuCreatePuots($id) {
            $pid = $id;
            $pdate = ImgFile::getDateRussian();
            $ls = LktsLs::where('id', $id)->get();
            $lkts = LktsLs::findOrFail($id);
        return view('admin.lkts.lsu.create_puots', compact(['pid', 'pdate', 'ls', 'lkts']));
    }

    public function editUsersPuCreatePuots($id) {
            $lkts_ls_puot = LktsLsPuot::findOrFail($id);
            $lkts = LktsLs::findOrFail($lkts_ls_puot->id_lkts_ls);
            $lkts_ls = DB::select('select id from lkts_ls where id_lkts_users = :id', ['id' => $lkts_ls_puot->id_lkts_ls]);
            $lkts_ls_u = DB::select('select lkts_ls.id as id, lkts_ls.ls as ls, users.name as fio, rco_maps.name as street, lkts_ls.office as office, users.email as email from lkts_ls, users, rco_maps where lkts_ls.id_lkts_users = users.id and lkts_ls.id_maps = rco_maps.id and lkts_ls.id_lkts_users = :id', ['id' => $lkts_ls_puot->id_lkts_ls]);
            $lkts_ls_pu_ot_datas = DB::select('SELECT lkts_ls_pu_ot_datas.pu_data, lkts_ls_pus.namepu, lkts_ls_pus.numberpu FROM lkts_ls_pu_ot_datas, lkts_ls_pus where lkts_ls_pu_ot_datas.id_lkts_ls_pus = lkts_ls_pus.id and lkts_ls_pu_ot_datas.id_lkts_ls_puots = :id', ['id' => $id]);       
        return view('admin.lkts.lsu.edit_puots', compact(['id', 'lkts_ls', 'lkts_ls_puot', 'lkts_ls_pu_ot_datas', 'lkts_ls_u', 'lkts']));
    }

    public function storeUsersPuCreatePuots(Request $request) {
            $puots = LktsLsPuot::create([
                'id_lkts_ls' => $request->id_lkts_ls,
                'title' => 'Показания ПУ за ' . $request->pdate
            ]);
            $puots->save();
            Session::flash('success','Подготовка к отправки данных ПУ!');
        return redirect()->route('admin.lkts.lsu.edit_puots', ['id' => $puots->id]);
    }

    public function storeUsersPuCreatePuotsAddP(Request $request) 
    {
        $vRules = [
            'pu_data' => 'required'
        ];

        $vMessage =
        [
            'pu_data.required' => 'Поле "Показания" не может быть пустым.'
        ];
        //Validol
        $this->validate($request, $vRules, $vMessage);

            $lkts_ls_pu_ot_datas = LktsLsPuOtData::create([
                'id_lkts_ls_puots' => $request->lkts_ls_puots_id,
                'id_lkts_ls_pus' => $request->id_lkts_ls_pus,
                'pu_data' => $request->pu_data,
                'created_at' => $request->lkts_ls_puots_date
            ]);
            $lkts_ls_pu_ot_datas->save();
            Session::flash('success','Данные записаны в таблицу!');
        return redirect()->route('admin.lkts.lsu.edit_puots', ['id' => $request->lkts_ls_puots_id]);
    }

    public function editUsersPuCreatePuotsAddP($id) {
            $lkts_ls_puot = LktsLsPuot::findOrFail($id);
            $lkts_ls = DB::select('select id from lkts_ls where id_lkts_users = :id', ['id' => $lkts_ls_puot->id_lkts_ls]);
            $lkts_ls_pus = DB::select('SELECT lkts_ls_pus.id as test, lkts_ls_pus.namepu, lkts_ls_pus.numberpu FROM lkts_ls, lkts_ls_pus where lkts_ls_pus.id_lkts_ls = lkts_ls.id and lkts_ls.id = :id', ['id' => $lkts_ls_puot->id_lkts_ls]);
        return view('admin.lkts.lsu.edit_puots_addp', compact(['id', 'lkts_ls', 'lkts_ls_puot', 'lkts_ls_pus']));
    }

    public function sendPuotsPu(Request $request) {
            $spp = LktsLsPuot::find($request->lkts_ls_puots_id);
            $spp->flag_write = 1;
            $spp->save();

            $fio = $request->fio;
            $email = $request->email;
            $ls = $request->ls;
            $street = $request->street;
            $office = $request->office;
            $red = $request->lkts_ls_puots_id;

            Mail::to('48439teplo@mail.ru')
            ->bcc(['kalva@obninsk.ru','pen07@obninsk.ru'])
            ->send(new MailLktsPu($fio, $email, $ls, $street, $office, $red));
            Session::flash('success','Показания прибора(ов) учета отправлены!');
        return redirect()->route('admin.lkts.lsu.edit_puots', ['id' => $request->lkts_ls_puots_id]);
    }

    public function deleteUsersPuCreatePuots($id)
    {
            //$LktsLsPuot = LktsLsPuot::find($id); 
            //$LktsLsPuot->delete();
       // return redirect()->route('admin.lkts.lsu.edit', ['id' => $LktsLsPuot->id_lkts_ls]);    
    }

    public function restoryUsersPuCreatePuots($id)
    {
           // $LktsLsPuot = LktsLsPuot::find($id); 
          //  $LktsLsPuot->delete();
       // return redirect()->route('admin.lkts.lsu.edit', ['id' => $LktsLsPuot->id_lkts_ls]);    
    }

    public function getPdfNew($id)
    {
            $SprBank = SprBank::findOrFail('2');
            $LktsLsCharge = LktsLsCharge::findOrFail($id);
            $LktsLs = LktsLs::findOrFail($LktsLsCharge->id_lkts_ls);
            $RcoMap = RcoMap::findOrFail($LktsLs->id_maps);
            $SiteSetting = SiteSetting::findOrFail('1');
            $pdf = PDF::loadView('admin.lkts.lsu.pdfnew', compact('SprBank', 'LktsLs', 'LktsLsCharge', 'RcoMap', 'SiteSetting'));
        return $pdf->stream();
    }
}