<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\LktsLsCharge;
use App\LktsLs;

class AdminImportCsv extends Model
{
    public static function getLktsLs() {
        return LktsLs::all(['id','ls']);
    }

    public static function getLktsLsOmpts() {
        return LktsLs::all(['ls']);
    }

    public static function getSQLBackupPdf() {
        $all = LktsLsCharge::all();
        foreach($all as $_all) {
            if($_all->flag_write == 0) {
                $all_s = LktsLsCharge::findOrFail($_all->id);
                Storage::disk('public')->delete('/lsu/'.$_all->pfiles);
                $all_s->flag_write = '1';
                $all_s->save();
            }
        }
    }

    public static function getSQLBackupPdfOmpts() {
        $all = LktsLsCharge::all();
        foreach($all as $_all) {
            if($_all->flag_write == 0) {
                $all_s = LktsLsCharge::findOrFail($_all->id);
                $all_s->flag_write = '1';
                $all_s->save();
            }
        }
    }
}
