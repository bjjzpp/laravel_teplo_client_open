<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\LktsEdo;
use App\LktsEdoFile;
use App\LktsEdoLog;
use App\LktsStatu;

class AdminLktsEdo extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminLktsEdo()
    {
        return view('admin.lkts.edo.index')
            ->with('LktsEdo', LktsEdo::orderBy('id','desc')->paginate(12));
    }

    public function editAdminLktsEdo($id)
    {
        return view('admin.lkts.edo.edit')
            ->with('LktsStatu', LktsStatu::orderBy('id','asc')->get())
            ->with('LktsEdo', LktsEdo::find($id));
    }

    public function updateAdminLktsEdo(Request $request, $id)
    {
            $rco = LktsEdo::find($id);

            $rco->save();
            Session::flash('success','Запись в бд обновлена!');
        return redirect()->route('admin.lkts.edo');
    }

    public function deleteAdminLktsEdo($id)
    {
            $af =  LktsEdoFile::where('lkts_edo_files_id', $id)->get();
            foreach($af as $AF) {
                Storage::disk('public')->delete($AF->pfiles);
            }
            LktsEdo::destroy($id);
            Session::flash('success','Запись в бд удалена!');
        return redirect()->route('admin.lkts.edo');
    }

    public function storeAdminLktsEdo_Log(Request $request)
    {
            $s = new LktsStatu();
            $s->lkts_edo_id = $request->lkts_edo_id;
            $s->save();
            Session::flash('success','Запись о договре добавлена!');
        return redirect()->route('admin.lkts.edo.edit', ['id' => $request->id_return]);
    }
}
