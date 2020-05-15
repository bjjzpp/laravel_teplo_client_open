<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Auth;
use Session;
use File;
use Mail;
use PDF;
use App\Lkts;
use App\User;
use App\LktsEdo;
use App\LktsPm;
use App\LktsEdoFile;
use App\LktsEdoLog;
use App\Mail\MailSupportAdmin;
use App\SprBank;
use App\Page;
use App\SiteSetting;

class LktsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function getlkts()
    {
        return view('lkts.index')
            ->with('Page', Page::all());
    }

    public function getProfile($id)
    {
        return view('lkts.profile.index')
            ->with('Lkts', Lkts::find($id));
    }

    public function getUpdateProfile(Request $request, $id)
    {
        $this->validate(request(), [
            'address' => 'required',
            'phone' => 'required'
        ]);

        $up = Lkts::find($id);
        $up->address = request()->address;
        $up->phone = request()->phone;
        $up->save();

        Session::flash('success', 'Ваш профиль обновлен!');
        return redirect()->route('lkts');
    }

    public function getPm()
    {
        return view('lkts.pm.index')
            ->with('LktsPm', LktsPm::where('id_lkts_users', Auth::id())->get());
    }

    public function getEdo()
    {
        return view('lkts.edo.index')
            ->with('LktsEdo', LktsEdo::where('id_lkts_users', Auth::id())->get());
    }

    public function getPmCreate()
    {
        return view('lkts.pm.create');
    }

    public function getEdoCreate()
    {
        return view('lkts.edo.create');
    }

    public function StorePm(Request $request)
    {
            $this->validate($request, [
                'pm_in' => 'required'
            ]);

            LktsPm::create([
                'id_lkts_users' => Auth::id(),
                'pm_in'	=> $request->pm_in,
                'status' => 0
            ]);

            $usend = User::find(Auth::id());
            $messages = "Новое сообщение от пользователя: ".$usend->name." - email($usend->email)";

            Mail::to('kalva@obninsk.ru')
                    ->bcc(['pen07@obninsk.ru'])
                    ->send(new MailSupportAdmin($messages));

            Session::flash('success', 'Ваше сообщение отправлено!');
        return redirect()->route('pm');
    }

    public function getPmShowId($id)
    {
        return view('lkts.pm.show')
            ->with('LktsPm', LktsPm::find($id));
    }


    public function EdoStore(Request $request)
    {
            $this->validate($request, [
                'edo_name_object' => 'required'
            ]);

            $id = LktsEdo::create([
                'id_lkts_users' => Auth::id(),
                'edo_name_object'	=> $request->edo_name_object,
                'edo_frm' => 0,
                'edo_out_lk' => 0,
                'edo_out_close' => 0
            ]);
            $id->save();
            Session::flash('success', 'Сохранение заявки!');
        return redirect()->route('edo.edit', [$id->id]);
    }

    public function getEdoEdit($id)
    {
        return view('lkts.edo.edit')
            ->with('LktsEdo', LktsEdo::find($id))
            ->with('LktsEdoFile', LktsEdoFile::where('lkts_edo_files_id', $id)->get());
    }

    public function EdoStoreFiels(Request $request)
    {

            $path_file = 'files/';
            if($request->hasFile('file_array')) {
                $image = $request->file('file_array');

                foreach($image as $im)
                {
                    $name = $im->getClientOriginalName();
                    $nfiles = pathinfo($name, PATHINFO_FILENAME);
                    $eexe = $im->getClientOriginalExtension();
                    $pfiles = time().'.'.str_slug($nfiles).'.'.$eexe;
                    $im->move(public_path($path_file), $pfiles);

                    LktsEdoFile::create([
                        'nfiles' => $nfiles,
                        'pfiles' => $pfiles,
                        'lkts_edo_files_id' => $request->num
                    ]);
                }
            }
        Session::flash('success', 'Выбранные файл(ы) успешно добавлены!');
        return redirect()->route('edo.edit', [$request->num]);
    }

    public function EdoDeleteFiels($id)
    {
           $lefd = LktsEdoFile::find($id);
           unlink(public_path('files/'.$lefd->pfiles));
           $lefd->delete();
            Session::flash('success', 'Файл удален!');
        return redirect()->route('edo.edit', [$lefd->lkts_edo_files_id]);
    }

    public function EdoStoreSend(Request $request)
    {
        $id = $request->sendedo;
        $ule = LktsEdo::find($id);
        $ule->edo_frm = 1;
        $ule->save();

        LktsEdoLog::create([
            'lkts_edo_id' => $id,
            'status_log_id' => 1
        ]);

        $usend = User::find(Auth::id());
        $messages = "Новая заявка от пользователя: ".$usend->name." - email($usend->email)";

        Mail::to('kalva@obninsk.ru')
                ->bcc(['pen07@obninsk.ru'])
                ->send(new MailSupportAdmin($messages));

            Session::flash('success', 'Ваша заявка успешно отправлена!');
        return redirect()->route('edo');
    }

    public function getEdoLog($id)
    {
        return view('lkts.edo.status')
            ->with('LktsEdoLog',  LktsEdoLog::where('lkts_edo_id', $id)->get());
    }

    public function getPdfNew($id)
    {
            $SprBank = SprBank::findOrFail('2');
            $LktsLsCharge = LktsLsCharge::findOrFail($id);
            $LktsLs = LktsLs::findOrFail($LktsLsCharge->id_lkts_ls);
            $RcoMap = RcoMap::findOrFail($LktsLs->id_maps);
            $SiteSetting = SiteSetting::findOrFail('1');
            $pdf = PDF::loadView('lkts.ls.pdfnew', compact('SprBank', 'LktsLs', 'LktsLsCharge', 'RcoMap', 'SiteSetting'));
        return $pdf->stream();
    }

    public function getPdfOld($id)
    {
           
    }
}
