<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\AdminImportCsv as aic;
use App\LktsLsCharge;
use App\LktsLs;
use App\LktsLsChargePrint;

class AdminImportCsv extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth', 'su', 'verified']);
    }

    public function UploadFielsCsv(Request $request) 
    {
          if ($request->input('csv_btn') != null) {
            $file = $request->file('pfiles');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $valid_extension = array("csv");
            $maxFileSize = 7340032;
            if(in_array(strtolower($extension), $valid_extension)){
              if($fileSize <= $maxFileSize){
                $location = 'uploads';
                $file->move($location,$filename);
                $filepath = public_path($location."/".$filename);
                $file = fopen($filepath,"r");
                $importData_arr = array();
                $i = 0;
                  while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata);
                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                  }
                fclose($file);
                  foreach($importData_arr as $id) {
                      foreach(aic::getLktsLs() as $id1) {
                          if($id[0] == $id1['ls']) {
                         /*    LktsLsCharge::create([
                                  'id_lkts_ls' => $id1['id'],
                                  'title' => $id[1],
                                  'debt' => $id[2],
                                  'advance_pay_begin' => $id[3],
                                  'pay' => $id[4],
                                  'charge' => $id[5],
                                  'payPeriod' => $id[6]
                              ]);*/
                          }
                      }
                  }
                }
                Session::flash('success','Загузка прошла успешно!');
              } else {
                Session::flash('success','Ошибка! Файл больше 7MB!');
              }
            } else {
              Session::flash('success','Файл инвалид, ошибка!');
            }
        return redirect()->route('admin.imports.lsu');
    }

    public function UploadOmptsFielsCsv(Request $request) 
    {
          if ($request->input('csv_btn') != null) {
            $file = $request->file('pfiles');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $valid_extension = array("csv");
            $maxFileSize = 7340032;
            if(in_array(strtolower($extension), $valid_extension)){
              if($fileSize <= $maxFileSize){
                $location = 'uploads';
                $file->move($location,$filename);
                $filepath = public_path($location."/".$filename);
                $file = fopen($filepath,"r");
                $importData_arr = array();
                $i = 0;
                  while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata);
                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                  }
                fclose($file);
                  foreach($importData_arr as $id) {
                      //foreach(aic::getLktsLsOmpts() as $id1) {
                        //if($id[1] == $id1['ls']) {
                        //} else {
                           LktsLs::create([
                              'id_maps' => $id[0],
                              'ls' => $id[1],
                              'lastname' => $id[2],
                              'firstname' => $id[3],
                              'middlename' => $id[4],
                              'email' => $id[5],
                              'company' => $id[6],
                              'office' => $id[7],
                              'coun_people' => $id[8],
                              'houseroom' => $id[9],
                              'houseroom_non_resident' => $id[10],
                              'houseroom_general' => $id[11],
                              'ticket_ver' => $id[12]
                            ]);
                           // dd($q);
                        //}
                      //}
                  }
                }
                Session::flash('success','Загузка прошла успешно!');
              } else {
                Session::flash('success','Ошибка! Файл больше 7MB!');
              }
            } else {
              Session::flash('success','Файл инвалид, ошибка!');
            }
        return redirect()->route('admin.imports.lsu_ompts');
    }

    public function UploadLsuOmptsChangeXml(Request $request) 
    {
      if ($request->input('xml_btn') != null) {
        $file = $request->file('pfiles');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $fileSize = $file->getSize();
        $valid_extension = array("xml");
        $maxFileSize = 7340032;
          if(in_array(strtolower($extension), $valid_extension)){
            if($fileSize <= $maxFileSize) {
              $location = 'uploads';
              $file->move($location, $filename);
              $filepath = public_path($location."/".$filename);
              $ompts_lss = simplexml_load_file($filepath) or die("Ошибка, создания объекта xml!");
              /*foreach($ompts_lss as $ompts_ls)
              {
                echo $ompts_ls->ls_qr."\n";
               
                echo $ompts_ls->fio_qr."\n\n\n\n";
                  foreach ($ompts_ls->charges->charge as $charge)
                  {
                      echo "(" . $charge->usluga_num . ") ". $charge->usluga_name ." - ". $charge->kolvo ." - ". $charge->order . "\n\n\n\n";
                  }
              }*/
              foreach($ompts_lss as $ompts_ls)
                {
                  foreach(aic::getLktsLs() as $id1) {
                    if($ompts_ls->ls_qr == $id1['ls']) {
                      //print_r($ompts_ls);
                      $id = LktsLsCharge::create([
                             'id_lkts_ls' => $id1['id'],
                             'title' => $ompts_ls->title_qr,
                             'debt' => $ompts_ls->debt_qr,
                             'advance_pay_begin' => $ompts_ls->advance_pay_begin_qr,
                             'pay' => $ompts_ls->pay_qr,
                             'charge' => $ompts_ls->charge_qr,
                             'payPeriod' => $ompts_ls->payPeriod_qr
                      ]);
                      $id->save();
                        foreach ($ompts_ls->charges->charge as $charge)
                          {
                            if($charge->kolvo != 0.00 and $charge->order != 0.00) {
                                LktsLsChargePrint::create([
                                  'id_lkts_ls_charges' => $id,
                                  'id_spr_uslugas' => $charge->usluga_num,
                                  'kolvo' =>  $charge->kolvo,
                                  'summa' => $charge->order,
                                ]);
                            }
                          }
                    }
                  }
                }
              Session::flash('success','Загузка прошла успешно!');
            } else {
              Session::flash('success','Ошибка! Файл больше 7MB!');
            }
          } else {
              Session::flash('success','Файл инвалид, ошибка!');
          }
      return redirect()->route('admin.imports.lsu_ompts');
      }
    }

    public function UploadLsuOmptsMiniXml(Request $request) 
    {
          if ($request->input('xml_btn') != null) {
              $file = $request->file('pfiles');
              $filename = $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $fileSize = $file->getSize();
              $valid_extension = array("xml");
              $maxFileSize = 7340032;
              if(in_array(strtolower($extension), $valid_extension)){
                  if($fileSize <= $maxFileSize) {
                    $location = 'uploads';
                    $file->move($location, $filename);
                    $filepath = public_path($location."/".$filename);
                    $ompts_lss = simplexml_load_file($filepath) or die("Ошибка, создания объекта xml!");
                      foreach($ompts_lss as $ompts_ls)
                      {
                        foreach(aic::getLktsLs() as $id1) {
                          if($ompts_ls->ls_qr == $id1['ls']) {
                            //print_r($ompts_ls);
                            LktsLsCharge::create([
                                  'id_lkts_ls' => $id1['id'],
                                  'title' => $ompts_ls->title_qr,
                                  'debt' => $ompts_ls->debt_qr,
                                  'advance_pay_begin' => $ompts_ls->advance_pay_begin_qr,
                                  'pay' => $ompts_ls->pay_qr,
                                  'charge' => $ompts_ls->charge_qr,
                                  'payPeriod' => $ompts_ls->payPeriod_qr
                              ]);
                          }
                      }
                      }
                    Session::flash('success','Загузка прошла успешно!');
                  } else {
                  Session::flash('success','Ошибка! Файл больше 7MB!');
              }
            } else {
                Session::flash('success','Файл инвалид, ошибка!');
            }
      return redirect()->route('admin.imports.lsu_ompts');
        }
    }

}