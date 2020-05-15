<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Auth;
use Session;
use App\User;
use App\Page;
use App\LktsLs;
use App\LktsLsPu;
use App\LktsLsPuFile;
use App\LktsLsPuot;
use App\LktsLsPuOtData;
use App\LktsLsDog;
use App\LktsLsDogFile;
use App\RcoMap;
use App\LktsLsCharge;
use DB;
use App\Helpers\pen07\ImgFile;
use Mail;
use App\Mail\MailSupportAdmin;
use App\Mail\MailLktsLsPin;
use App\Mail\MailLktsPu;
use App\UsersLs;

class LsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function getLs() {
        $LktsLs = LktsLs::where('id_lkts_users', Auth::id())->get();
        return view('lkts.ls.index', compact('LktsLs'));
    }

    public function getLsUsersCreate()
    {
        return view('lkts.ls.create')
            ->with('RcoMap', RcoMap::where('flag_pd','0')->orderBy('name','asc')->get());
    }

    public function getLsUsersConnLs($id)
    {
        try {
                $LktsLs = LktsLs::where('ls', $id)->get();
                $uid = Auth::user()->id;         
            return view('lkts.ls.conn_ls', compact('LktsLs', 'uid'));
        } catch(Exception $e) {
            Log::error($e->getMessage());
            abort(404);
        }
    }

    public function storeLsUsersConnLsAdd(Request $request)
    {
        $LktsLs = LktsLs::findOrFail($request->idls);
            if($LktsLs->ls_user_active == 0) {
                $LktsLs->id_lkts_users = $request->id_lkts_users;
                $LktsLs->ls_user_active = '1';
                $LktsLs->save();
             Mail::to($u->email)
                    ->send(new MailLktsLsPin($LktsLs->ls, $LktsLs->pin));  
            } elseif($LktsLs->ls_user_active == 1) {
                $LktsLs->id_lkts_users = $request->id_lkts_users;
                $LktsLs->save();
            }
            Session::flash('success','Л/С подключен!');
        return redirect()->route('ls'); 
    }

    public function getLsUsersEdit($id)
    {
        $q1 = LktsLs::findOrFail($id);
            return view('lkts.ls.edit')
                    ->with('LktsLs', LktsLs::findOrFail($id))
                    ->with('LktsLsCharge', LktsLsCharge::where('id_lkts_ls', $id)->orderBy('id','desc')->get())
                    ->with('LktsLsPuot', LktsLsPuot::where('id_lkts_ls', $id)->orderBy('id','asc')->get())
                    ->with('RcoMap', RcoMap::where('flag_pd','0')->orderBy('name','asc')->get());        
    }

    public function getLsUsersActivePinSend($id)
    {
            $lkts_ls = LktsLs::findOrFail($id);
            $u = User::findOrFail($lkts_ls->id_lkts_users);
            Mail::to($u->email)
                    ->send(new MailLktsLsPin($lkts_ls->ls, $lkts_ls->pin));
        return view('lkts.message.sendpin', compact('lkts_ls'));
    }    

    public function storePinLs(Request $request)
    {
        $vRules = ['upin' => 'required'];
        $vMessage = ['upin.required' => 'Поле "Пин-код" не может быть пустым.'];
        //Validol
        $this->validate($request, $vRules, $vMessage);
         try {
                UsersLs::create([
                    'id_user' => Auth::id(),
                    'id_lkts_ls' => $request->ulsid,
                    'pin' => $request->upin
                ]);
                $u_LktsLs = LktsLs::findOrFail($request->ulsid);
                $u_LktsLs->ls_user_active = '1';
                $u_LktsLs->pin_active = '1';
                $u_LktsLs->save();    
                Session::flash('success', 'Л/С активирован!');
            return redirect()->route('ls');
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function getLsUsersDelele($id)
    {
            $lkts_ls = LktsLs::findOrFail($id);
            $lkts_ls->id_lkts_users = '0';
            //$lkts_ls->ls_user_active = '0';
            $lkts_ls->save();
            Session::flash('success','Л/С отключен!');
        return redirect()->route('ls');
    }

    public function getLsUPuEdit($id)
    {
        return view('lkts.ls.edit_pu')
                ->with('LktsLs', LktsLsPu::find($id));
    }

    public function storeLsUsers(Request $request)
    {
        $vRules = [
            'ls' => 'required',
            'office' => 'required'
        ];

        $vMessage =
        [
            'ls.required' => 'Поле "Л/С" не может быть пустым.',
            'office.required' => 'Поле "Кв" не может быть пустым.'
        ];
        //Validol
        $this->validate($request, $vRules, $vMessage);
         try {
                $id = LktsLs::create([
                    'id_lkts_users' => $request->user_id,
                    'lastname' => $request->lastname,
                    'firstname' => $request->firstname,
                    'middlename' => $request->middlename,
                    'pin' => $request->pin,
                    'ls'	=> $request->ls,
                    'ls_gis_gkx' =>$request->ls_gis_gkx,
                    'id_maps' => $request->id_maps,
                    'ls_user_active' => 1,
                    'office' => $request->office,
                    'ticket_ver' => $request->ticket_ver,
                    'pin_active' => 1
                ]);
                $id->save();
                UsersLs::create([
                    'id_user' => $request->user_id,
                    'id_lkts_ls' => $id->id,
                    'pin' => $request->pin
                ]);
                $mlkts = LktsLs::find($id->id);
                $messages = "Добавлен новый Л/С: " .$mlkts->ls. "ФИО: ".$mlkts->lastname." ".$mlkts->firstname. " ".$mlkts->middlename. "Улица: " .$mlkts->rco_maps->name. "Кв: ".$mlkts->office;
                Mail::to('kalva@obninsk.ru')
                    ->bcc(['pen07@obninsk.ru'])
                    ->send(new MailSupportAdmin($messages));
                Session::flash('success', 'Запись в бд добавлена!');
            return redirect()->route('ls.edit', [$id->id]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function UpdateLsUsers(Request $request, $id)
    {
        /*$vRules = [
            'ls' => 'required',
            'office' => 'required'
        ];

        $vMessage =
        [
            'ls.required' => 'Поле "Л/С" не может быть пустым.',
            'office.required' => 'Поле "Кв" не может быть пустым.'
        ];
        //Validol
        $this->validate($request, $vRules, $vMessage);
        try {
            $rco = LktsLs::find($id);
            $rco->ls = $request->ls;
            $rco->id_maps = $request->id_maps;
            $rco->office = $request->office;
            $rco->save();
            Session::flash('success','Запись в бд обновлена!');
        return redirect()->route('lsu');
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }*/
      return redirect()->route('lsu');
    }

    public function getLsUsersPuCreate($id)
    {
        return view('lkts.ls.create_pu')
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
                $messages = "Добавлен новый ПУ: ".$request->namepu." - ".$request->numberp."Л/С: ".$ls->ls. "ФИО: ".$ls->lastname." ".$ls->firstname. " ".$ls->middlename."Улица: ".$ls->rco_maps->name ."Кв: ".$ls->office;
                Mail::to('kalva@obninsk.ru')
                    ->bcc(['pen07@obninsk.ru'])
                    ->send(new MailSupportAdmin($messages));
                Session::flash('success', 'Запись в бд добавлена!');
            return redirect()->route('ls.edit', ['id' => $request->id_return]);
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
            $rco1 = LktsLsPu::find($id);
            $rco1->namepu = $request->namepu;
            $rco1->numberpu = $request->numberpu;
            $rco1->dizg = \Carbon\Carbon::parse($request->dizg)->format('Y-m-d');
            $rco1->save();
            Session::flash('success','Запись в бд обновлена!');
            return redirect()->route('ls.edit', ['id' => $request->id_return]);
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }

    public function getLsUsersDogCreate($id)
    {
        return view('lkts.ls.create_dog')
            ->with('LktsLs', LktsLs::findOrFail($id));
    }

    public function getLsUsersDogEdit($id)
    {
        return view('lkts.ls.edit_dog')
            ->with('LktsLsDog', LktsLsDog::find($id));
    }


    public function storeLsDog(Request $request)
    {
        $vRules = [
            'dognumber' => 'required',
            'dbegin' => 'required'
        ];

        $vMessage =
        [
            'dognumber.required' => 'Поле "№ Договора" не может быть пустым.',
            'dbegin.required' => 'Поле "Дата начала" не может быть пустым.'
        ];
        //Validol
        $this->validate($request, $vRules, $vMessage);
         try {
                $id = LktsLsDog::create([
                    'id_lkts_ls' => $request->id_return,
                    'dognumber'	=> $request->dognumber,
                    'dbegin' => \Carbon\Carbon::parse($request->dbegin)->format('Y-m-d')
                ]);
                $id->save();
                Session::flash('success', 'Запись в бд добавлена!');
            return redirect()->route('ls.edit', ['id' => $request->id_return]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function storeLsDogUpdate(Request $request, $id)
    {
       $vRules = [
            'dognumber' => 'required',
            'dbegin' => 'required'
        ];

        $vMessage =
        [
            'dognumber.required' => 'Поле "№ Договора" не может быть пустым.',
            'dbegin.required' => 'Поле "Дата начала" не может быть пустым.'
        ];
        //Validol
        $this->validate($request, $vRules, $vMessage);
        try {
            $rco1 = LktsLsDog::find($id);
            $rco1->dognumber = $request->dognumber;
            $rco1->dbegin = \Carbon\Carbon::parse($request->dbegin)->format('Y-m-d');;
            $rco1->dend = \Carbon\Carbon::parse($request->dend)->format('Y-m-d');
            $rco1->save();
            Session::flash('success','Запись в бд обновлена!');
            return redirect()->route('ls.edit', ['id' => $request->id_return]);
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }

    public function createFileDog($id)
    {
        return view('lkts.ls.create_dogf')
            ->with('LktsLsDog', LktsLsDog::findOrFail($id));
    }

    public function storeLsDogFile(Request $request)
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
            $af = new LktsLsDogFile();
            $af->id_lkts_ls_dogs = $request->id_return;
            $af->nfiles =  $request->nfiles;
            $af->pfiles = $filename;
            $af->save();
            Session::flash('success','Файл добавлен!');
        return redirect()->route('ls.dog.edit', ['id' => $request->id_return]);
      } catch(Exception $e) {
          Log::error($e->getMessage());
      }
    }

    public function getLsCheckSystem(Request $request){
            $lkts_ls = LktsLs::where('ls', 'LIKE', '%'.$request->ls."%")->get();
                foreach($lkts_ls as $ls) {
                    $p_array[] = $ls;
                }
        return response()->json($p_array);
    }

    public function getNumberPuCheckSystem(Request $request){
            $lkts_ls = LktsLsPu::where('numberpu', 'LIKE', '%'.$request->numberpu."%")->get();
                foreach($lkts_ls as $ls) {
                    $p_array[] = $ls;
                }
        return response()->json($p_array);
    }

    public function getLsUsersPuCreatePuots($id) {
            $pid = $id;
            $pdate = ImgFile::getDateRussian();
            $ls = LktsLs::where('id', $id)->get();
        return view('lkts.ls.create_puots', compact(['pid', 'pdate', 'ls']));
    }


    public function storeUsersPuCreatePuots(Request $request) {
            $puots = LktsLsPuot::create([
                'id_lkts_ls' => $request->id_lkts_ls,
                'title' => 'Показания ПУ за ' . $request->pdate
            ]);
            $puots->save();
            Session::flash('success','Подготовка к отправки данных ПУ!');
        return redirect()->route('ls.edit_puots', ['id' => $puots->id]);
    }

    public function editUsersPuCreatePuots($id) {
            $lkts_ls_puot = LktsLsPuot::findOrFail($id);
            $lkts_ls = DB::select('select id from lkts_ls where id_lkts_users = :id', ['id' => $lkts_ls_puot->id_lkts_ls]);
            $lkts_ls_u = DB::select('select lkts_ls.id as id, lkts_ls.ls as ls, users.name as fio, rco_maps.name as street, lkts_ls.office as office, users.email as email from lkts_ls, users, rco_maps where lkts_ls.id_lkts_users = users.id and lkts_ls.id_maps = rco_maps.id and lkts_ls.id_lkts_users = :id', ['id' => $lkts_ls_puot->id_lkts_ls]);
            $lkts_ls_pu_ot_datas = DB::select('SELECT lkts_ls_pu_ot_datas.pu_data, lkts_ls_pus.namepu, lkts_ls_pus.numberpu FROM lkts_ls_pu_ot_datas, lkts_ls_pus where lkts_ls_pu_ot_datas.id_lkts_ls_pus = lkts_ls_pus.id and lkts_ls_pu_ot_datas.id_lkts_ls_puots = :id', ['id' => $id]);       
        return view('lkts.ls.edit_puots', compact(['id', 'lkts_ls', 'lkts_ls_puot', 'lkts_ls_pu_ot_datas', 'lkts_ls_u']));
    }

    public function editUsersPuCreatePuotsAddP($id) {
            $lkts_ls_puot = LktsLsPuot::findOrFail($id);
            $lkts_ls = DB::select('select id from lkts_ls where id_lkts_users = :id', ['id' => $lkts_ls_puot->id_lkts_ls]);
            $lkts_ls_pus = DB::select('SELECT lkts_ls_pus.id as test, lkts_ls_pus.namepu, lkts_ls_pus.numberpu FROM lkts_ls, lkts_ls_pus where lkts_ls_pus.id_lkts_ls = lkts_ls.id and lkts_ls.id = :id', ['id' => $lkts_ls_puot->id_lkts_ls]);
        return view('lkts.ls.edit_puots_addp', compact(['id', 'lkts_ls', 'lkts_ls_puot', 'lkts_ls_pus']));
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
        return redirect()->route('ls.edit_puots', ['id' => $request->lkts_ls_puots_id]);
    }

    public function getUsersPuCreatePuotsAddP(Request $request) {
        $lkts_ls = LktsLsPuOtData::where('id_lkts_ls_puots','=',$request->id_lkts_ls_puots)->where('id_lkts_ls_pus', 'LIKE', '%'.$request->id_lkts_ls_pus."%")->get();
            foreach($lkts_ls as $ls) {
                    $p_array[] = $ls;
            }
        return response()->json($p_array);
    }

    public function sendPuotsPu(Request $request) {
            $spp = LktsLsPuot::find($request->lkts_ls_puots_id);
            $spp->flag_write = 1;
            $spp->save();

          
            $red = $request->lkts_ls_puots_id;
            $red_ls = $spp->id_lkts_ls;
            Mail::to('48439teplo@mail.ru')
                ->bcc(['kalva@obninsk.ru','pen07@obninsk.ru'])
                ->send(new MailLktsPu($red, $red_ls));
            Session::flash('success','Показания прибора(ов) учета отправлены!');
        return redirect()->route('ls.edit_puots', ['id' => $request->lkts_ls_puots_id]);
    }
}