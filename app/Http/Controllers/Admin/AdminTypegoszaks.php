<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\Typegoszak;

class AdminTypegoszaks extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminTypegoszaks()
    {
            $Typegoszaks = Typegoszak::all();
        return view('admin.spr.typegoszaks.index')->with('Typegoszaks', $Typegoszaks);
    }

    public function editAdminTypegoszaks(Request $request, $id)
    {
            //$Typegoszak = Typegoszak::find($id)->update($request->all());
        //return response()->json('ok');
        return response('ok', 200)->header('Content-Type', 'application/json');

    }

    public function storeAdminTypegoszaks(Request $request)
    {
            $Typegoszak = new Typegoszak();
            $Typegoszak->typename = $request->typename_add;
            $Typegoszak->save();
        return response()->json($Typegoszak);

    }

    public function deleteAdminTypegoszaks($id)
    {
           $tg = Typegoszak::destroy($id);
        return response()->json($tg);
    }
}
