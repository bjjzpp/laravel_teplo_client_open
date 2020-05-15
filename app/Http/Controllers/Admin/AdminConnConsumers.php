<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Auth;
use Session;
use App\ConnConsumer;
use App\ConnConsumersFile;

class AdminConnConsumers extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminHomeConnConsumers()
    {
        return view('admin.home.conn_consumers.index')
            ->with('ConnConsumer', ConnConsumer::all());
    }

    public function createAdminHomeConnConsumers()
    {
        return view('admin.home.conn_consumers.create');
    }

    public function editAdminHomeConnConsumers($id)
    {
        return view('admin.home.conn_consumers.edit')
            ->with('ConnConsumer', ConnConsumer::find($id));
    }

    public function storeAdminHomeConnConsumers(Request $request)
    {
            $vRules = [
                'title' => 'required',
                'full_text' => 'required'
            ];

            $vMessage =
            [
                'title.required' => 'Поле "Заголовок" не может быть пустым.',
                'full_text.required' => 'Поле "Описание" не может быть пустым.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);
            try {
                $a = new ConnConsumer();
                $a->title = $request->title;
                $a->full_text = $request->full_text;
                $a->save();
                Session::flash('success','Запись в бд добавлена!');
            return redirect()->route('admin.home.conn_consumers.edit', ['id' => $a->id]);
          } catch(Exception $e) {
              Log::error($e->getMessage());
          }
    }

    public function updateAdminHomeConnConsumers(Request $request, $id)
    {
            $vRules = [
                'title' => 'required',
                'full_text' => 'required'
            ];

            $vMessage =
            [
                'title.required' => 'Поле "Заголовок" не может быть пустым.',
                'full_text.required' => 'Поле "Описание" не может быть пустым.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);
            try {
                $a = ConnConsumer::findOrFail($id);
                $a->title = $request->title;
                $a->full_text = $request->full_text;
                $a->save();
                Session::flash('success','Запись в бд обновлена!');
              return redirect()->route('admin.home.conn_consumers');
           } catch(Exception $e) {
              Log::error($e->getMessage());
           }
    }

    public function deleteAdminHomeConnConsumers($id)
    {
      try {
            ConnConsumersFile::destroy($id);
            $af =  ConnConsumersFile::where('conn_consumer_id', $id)->get();
            foreach($af as $AF) {
                Storage::disk('public')->delete($AF->pfiles);
            }
            Session::flash('success','Запись в бд удалена!');
        return redirect()->route('admin.home.conn_consumers');
      } catch(Exception $e) {
         Log::error($e->getMessage());
      }
    }

    public function showFileAdminHomeConnConsumers($id)
    {
        return view('admin.home.conn_consumers.create_file')
            ->with('ConnConsumer', ConnConsumer::findOrFail($id));
    }

    public function storeFileAdminHomeConnConsumers(Request $request)
    {
            $vRules = [
                'nfiles' => 'required',
                'pfiles' => 'required'
            ];
            $vMessage =
            [
                'nfiles.required' => 'Поле "Наименование" не может быть пустым.',
                'pfiles.required' => 'Файл не выбран.'
            ];
            $this->validate($request, $vRules, $vMessage);
            try {
                $upfile = $request->file('pfiles');
                $filename = time().'_'.$upfile->getClientOriginalName();
                Storage::disk('public')->putFileAs(
                    '/',
                    $upfile,
                    $filename
                );
                $af = new ConnConsumersFile();
                $af->conn_consumer_id = $request->id_return;
                $af->nfiles =  $request->nfiles;
                $af->pfiles = $filename;
                $af->save();
                Session::flash('success','Файл добавлен!');
            return redirect()->route('admin.home.conn_consumers.edit', ['id' => $request->id_return]);
          } catch(Exception $e) {
             Log::error($e->getMessage());
          }
    }

    public function deleteFileAdminHomeConnConsumers($id)
    {
      try {
            $af = ConnConsumersFile::findOrFail($id);
            $af_id = $af->conn_consumer_id;
            Storage::disk('public')->delete($af->pfiles);
            $af->delete();
            Session::flash('success','Файл удален!');
        return redirect()->route('admin.home.conn_consumers.edit', ['id' => $af_id]);
      } catch(Exception $e) {
         Log::error($e->getMessage());
      }
    }
}
