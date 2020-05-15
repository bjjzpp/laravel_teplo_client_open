<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\News;
use App\NewsFile;

class AdminNews extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'su', 'verified']);
    }

    public function getAdminHomeNews()
    {
        return view('admin.home.news.index')
            ->with('News', News::all());
    }

    public function createAdminHomeNews()
    {
        return view('admin.home.news.create');
    }

    public function editAdminHomeNews($id)
    {
        return view('admin.home.news.edit')
            ->with('News', News::findOrFail($id));
    }

    public function storeAdminHomeNews(Request $request)
    {
            $vRules = [
                'title_news' => 'required',
                'body_news' => 'required'
            ];

            $vMessage =
            [
                'title_news.required' => 'Поле "Заголовок" не может быть пустым.',
                'body_news.required' => 'Поле "Описание" не может быть пустым.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);

            try {
                  $a = new News();
                  $a->title_news = $request->title_news;
                  $a->body_news = $request->body_news;
                  $a->save();
                  Session::flash('success','Запись в бд добавлена!');
              return redirect()->route('admin.home.news.edit', ['id' => $a->id]);
            } catch(Exception $e) {
       
            }
    }

    public function updateAdminHomeNews(Request $request, $id)
    {
            $vRules = [
                'title_news' => 'required',
                'body_news' => 'required'
            ];

            $vMessage =
            [
                'title_news.required' => 'Поле "Заголовок" не может быть пустым.',
                'body_news.required' => 'Поле "Описание" не может быть пустым.'
            ];
            //Validol
            $this->validate($request, $vRules, $vMessage);
            try{
                  $a = News::findOrFail($id);
                  $a->title_news = $request->title_news;
                  $a->body_news = $request->body_news;
                  $a->save();
                  Session::flash('success','Запись в бд обновлена!');
              return redirect()->route('admin.home.news');
            } catch(Exception $e) {
        
            }
    }

    public function deleteAdminHomeNews($id)
    {
      try {
            News::destroy($id);
            $af =  NewsFile::where('news_id', $id)->get();
            foreach($af as $AF) {
                Storage::disk('public')->delete($AF->pfiles);
            }
            Session::flash('success','Запись в бд удалена!');
        return redirect()->route('admin.home.news');
      } catch(Exception $e) {
     
      }
    }

    public function showFileAdminHomeNews($id)
    {
        return view('admin.home.news.create_file')
            ->with('News', News::findOrFail($id));
    }

    public function storeFileAdminHomeNews(Request $request)
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

                  $af = new NewsFile();
                  $af->news_id = $request->id_return;
                  $af->nfiles =  $request->nfiles;
                  $af->pfiles = $filename;
                  $af->save();
                  Session::flash('success','Файл добавлен!');
              return redirect()->route('admin.home.news.edit', ['id' => $request->id_return]);
            } catch(Exception $e) {

            }

         }

    public function deleteFileAdminHomeNews($id)
    {
      try {
              $af = NewsFile::findOrFail($id);
              $af_id = $af->news_id;
              Storage::disk('public')->delete($af->pfiles);
              $af->delete();
              Session::flash('success','Файл удален!');
              return redirect()->route('admin.home.news.edit', ['id' => $af_id]);
          } catch(Exception $e) {
            
        }
    }
}
