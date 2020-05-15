<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\AdminImportCsv;
use App\SiteSetting;
use App\SprBank;

class AdminLktsImportOmpts extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminImportsLsuOmptsIndex() {
        return view('admin.imports.lsu_ompts.index');
    }

    public function getLoadCsvOmptsLsu() {
        return view('admin.imports.lsu_ompts.loadcsv');
    }

    public function getQrCodeGenerateOmpts() 
    {
           $Ss = SiteSetting::find(1);
           $Sb = SprBank::where('flag','1')->where('ticket_ver','1')->get();
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
                                    WHERE lklsc.flag_write = 0 and lts.ticket_ver = 1"));
        return view('admin.imports.lsu_ompts.qrcode', compact('qr_code', 'Ss', 'Sb'));
      }

      public function getLoadXmlOmptsLsuChange() 
      {
        return view('admin.imports.lsu_ompts.loadxmlchange');
      }

      public function getLoadXmlOmptsLsuMini() 
      {
        return view('admin.imports.lsu_ompts.loadxmlmini');
      }
}