<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\AdminImportCsv;
use DB;
use App\SiteSetting;
use App\SprBank;

class AdminLktsImport extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminImportsLsuIndex() {
        return view('admin.imports.lsu.index');
    }

    public function UploadFielsLsu(Request $request) {
        $this->validate($request, [
            'pfiles' => 'required',
            'pfiles.*' => 'mimes:pdf'
        ]);

            if($request->hasfile('pfiles')) {
                $pfiles = $request->file('pfiles');
                foreach($pfiles as $pfile) {
                    $filename = $pfile->getClientOriginalName();
                    Storage::disk('public')->putFileAs(
                        'lsu',
                        $pfile,
                        $filename
                    );
                }
            }
        return redirect()->route('admin.imports.lsu');
    }

    public function getSqlBackeupLsu() {
            AdminImportCsv::getSQLBackupPdf();
        return redirect()->route('admin.imports.lsu.loadpdf');
    }

    public function getSqlBackeupLsuOmpts() {
            AdminImportCsv::getSQLBackupPdfOmpts();
        return redirect()->route('admin.imports.lsu_ompts');
    }

    public function getLoadPdfLsu() {
        return view('admin.imports.lsu.loadpdf');
    }

    public function getLoadCsvLsu() {
        return view('admin.imports.lsu.loadcsv');
    }

    public function getQrCodeGenerate() 
    {
           $Ss = SiteSetting::find(1);
           $Sb = SprBank::where('flag','1')->where('ticket_ver','0')->get();
           $qr_code = DB::select(DB::raw("SELECT 
                                          u.lastname, 
                                          u.name AS firstname, 
                                          u.middlename, 
                                          lts.ls, 
                                          lts.ls_gis_gkx, 
                                          rcm.name AS street, 
                                          lts.office, 
                                          lklsc.title, 
                                          lklsc.charge,
                                          lklsc.payPeriod 
                                    FROM lkts_ls lts
                                      LEFT JOIN lkts_ls_charges lklsc on lklsc.id_lkts_ls = lts.id
                                      LEFT JOIN users u ON u.id = lts.id_lkts_users
                                      LEFT JOIN rco_maps rcm ON rcm.id = lts.id_maps
                                    WHERE lklsc.flag_write = 0 and lts.ticket_ver = 0"));
        return view('admin.imports.lsu.qrcode', compact('qr_code', 'Ss', 'Sb'));
      }
}