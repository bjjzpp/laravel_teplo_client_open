<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSetting;
use App\Page;
use App\Abon;
use App\ConnConsumer;
use App\Meteoarh;
use App\About;
use App\StandartBf;
use App\StandartType;
use App\Goszak;
use App\GoszakType;
use App\FzPlan;
use App\Yeargoszak;
use App\OtchetGoszak;
use App\PersonFaq;
use App\Tchema;
use App\Rco;
use App\RcoMap;
use App\Training;
use App\Pay;
use App\News;
use App\NewsFile;
use Session;
use Mail;
use App\Mail\MailFaq;
use App\Mail\MailPu;
use App\Helpers\pen07\ImgFile;
use DB;
use PDF;

class PagesController extends Controller
{
    public function getIndex()
    {
        return view('index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(1))
            ->with('StandartBf', StandartBf::orderBy('id', 'desc')->get())
            ->with('News', News::orderBy('created_at', 'desc')->get())
            ->with('Rco', Rco::where('rso', 1)->orderBy('title', 'asc')->get())
            ->with('Rco1', Rco::where('rso', 0)->orderBy('title', 'asc')->get())
            //->with('Meteoarh', Meteoarh::orderBy('id', 'desc')->take(1)->get())
            ->with('Tchema', Tchema::orderBy('id', 'desc')->get());
    }

    public function getAbon()
    {
        return view('site.abon.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(6))
            ->with('Abon', Abon::orderBy('id', 'asc')->get());
    }

    public function getAbonShowId($id)
    {
            $abon = Abon::find($id);
        return view('site.abon.show')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('abon', $abon);
    }

    public function getNews()
    {
        return view('site.news.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(11))
            ->with('News', News::orderBy('created_at', 'desc')->paginate(30));
    }

    public function getNewsShowId($id)
    {
            $News = News::find($id);
        return view('site.news.show')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('News', $News);
    }

    public function getPay()
    {
        return view('site.pay.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(13))
            ->with('Pay', Pay::orderBy('id', 'asc')->get());
    }

    public function getPayShowId($id)
    {
            $pay = Pay::find($id);
        return view('site.pay.show')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('pay', $pay);
    }

    public function getRco()
    {
        return view('site.rco.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Rco', Rco::where('rso', 1)->orderBy('title', 'asc')->get())
            ->with('Rco1', Rco::where('rso', 0)->orderBy('title', 'asc')->get());
    }

    public function getRcoShowId($id)
    {
            $rco = Rco::find($id);
            $rcomap = RcoMap::where('rco_id', $rco->id)->orderBy('dfiles','asc')->get();
        return view('site.rco.show')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('rco', $rco)
            ->with('rcomap', $rcomap);
    }

    public function getConnConsumers()
    {
        return view('site.conn_consumers.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(7))
            ->with('ConnConsumer', ConnConsumer::orderBy('title', 'asc')->get());
    }


    public function getConnConsumerShowId($id)
    {
        $ConnConsumer = ConnConsumer::find($id);
            return view('site.conn_consumers.show')
                ->with('SiteSetting', SiteSetting::find(1))
                ->with('ConnConsumer', $ConnConsumer);
    }

    public function getContacts()
    {
        return view('site.contacts.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(4));
    }

    public function getJob()
    {
        return view('site.job.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(5));
    }

    public function getMeteo()
    {
        return view('site.meteo.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(9))
            ->with('Meteo', Meteoarh::orderBy('id','desc')->first());
    }

    public function getScada()
    {
        return view('site.pts.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(8));
    }

    public function getAbout()
    {
        return view('site.about.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(10))
            ->with('About', About::orderBy('title', 'asc')->get());
    }

    public function getAboutShowId($id)
    {
        $About = About::find($id);
            return view('site.about.show')
                ->with('SiteSetting', SiteSetting::find(1))
                ->with('About', $About);
    }

    public function getGoszak()
    {
        switch(request('filter')) {
            case 'podacha-zayavok':
                $results = Goszak::where('goszak_types_id', 1)->orderBy('id','desc')->paginate(16)->appends(['filter' => 'podacha-zayavok']);
            break;

            case 'rabota-komissii':
                $results = Goszak::where('goszak_types_id', 12)->orderBy('id','desc')->paginate(16)->appends(['filter' => 'rabota-komissii']);
            break;

            case 'razmeshchenie-zaversheno':
                $results = Goszak::where('goszak_types_id', 3)->orderBy('id','desc')->paginate(16)->appends(['filter' => 'razmeshchenie-zaversheno']);
            break;

            case 'razmeshchenie-otmeneno':
                $results = Goszak::where('goszak_types_id', 4)->orderBy('id','desc')->paginate(16)->appends(['filter' => 'razmeshchenie-otmeneno']);
            break;

            default:
                $results = Goszak::where('goszak_types_id', 1)->orderBy('id','desc')->paginate(16)->appends(['filter' => 'podacha-zayavok']);
            break;
        }

        return view('site.goszak.index', ['Goszak' => $results])
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(3))
            ->with('GoszakType', GoszakType::all());
    }

    public function getSearchGoszak()
    {
        $s = Goszak::where('ztext', 'like', '%'.request('search').'%')->orderBy('id','desc')->paginate(25);
        return view('site.goszak.search', ['GoszakSearch' => $s])
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(2))
            ->with('StandartType', StandartType::all());
    }

    public function getGoszakShowId($id)
    {
        return view('site.goszak.show')
                ->with('SiteSetting', SiteSetting::find(1))
                ->with('Goszak', Goszak::find($id));
    }

    public function getStandartBf()
    {
        switch(request('filter')) {
            case 'balans':
               $results = StandartBf::where('standart_type_id', 8)->orderBy('id','desc')->paginate(7)->appends(['filter' => 'balans']);
            break;

            case 'formy-raskrytiya-informatsii':
                $results = StandartBf::where('standart_type_id', 9)->orderBy('id','desc')->paginate(7)->appends(['filter' => 'formy-raskrytiya-informatsii']);
            break;

            case 'kartina-prosrochennoy-zadolzhennosti':
               $results = StandartBf::where('standart_type_id', 10)->orderBy('id','desc')->paginate(7)->appends(['filter' => 'kartina-prosrochennoy-zadolzhennosti']);
            break;

            case 'promyshlennaya-bezopasnost':
                $results = StandartBf::where('standart_type_id', 11)->orderBy('id','desc')->paginate(7)->appends(['filter' => 'promyshlennaya-bezopasnost']);
            break;

            case 'okhrana-truda':
                $results = StandartBf::where('standart_type_id', 13)->orderBy('id','desc')->paginate(7)->appends(['filter' => 'okhrana-truda']);
            break;

            default:
                $results = StandartBf::where('standart_type_id', 7)->orderBy('id','desc')->paginate(7)->appends(['filter' => 'informatsiya']);
            break;
        }

        return view('site.standart.index', ['Standart' => $results])
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(2))
            ->with('StandartType', StandartType::all());
    }

    public function getSearchStandartBf()
    {
        $s = StandartBf::where('ztext', 'like', '%'.request('search').'%')->orderBy('id','desc')->paginate(16);
        return view('site.standart.search', ['StandartSearch' => $s])
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Page', Page::find(2))
            ->with('StandartType', StandartType::all());
    }

    public function getStandartBfShowId($id)
    {
        return view('site.standart.show')
                ->with('SiteSetting', SiteSetting::find(1))
                ->with('StandartBf', StandartBf::find($id));
    }

    public function getPlanFz()
    {
        return view('site.fzplan.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('FzPlan', FzPlan::orderBy('id', 'desc')->paginate(16))
            ->with('GoszakType', GoszakType::all());
    }

    public function getFzOtchet()
    {
        return view('site.fzotchet.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('OtchetGoszak', OtchetGoszak::orderBy('id', 'desc')->paginate(12))
            ->with('GoszakType', GoszakType::all());
    }

    public function getFzplanShowId($id)
    {
        return view('site.fzplan.show')
                ->with('SiteSetting', SiteSetting::find(1))
                ->with('FzPlan', FzPlan::find($id));
    }

    public function getFzotchetShowId($id)
    {
        return view('site.fzotchet.show')
                ->with('SiteSetting', SiteSetting::find(1))
                ->with('OtchetGoszak', OtchetGoszak::find($id));
    }

    public function getFeedback()
    {
        return view('site.feedback.index')
            ->with('SiteSetting', SiteSetting::find(1));
    }

    public function getSendPu()
    {
        return view('site.feedback.pu')
            ->with('SiteSetting', SiteSetting::find(1));
    }

    public function getSend(Request $result)
    {
            $vRules = [
                'fio' => 'required',
                'email' => 'email',
                'phone' => 'required',
                'adress' => 'required',
                'subject1' => 'required',
                'messages' => 'required'
            ];

            $vMessage =
            [
                'fio.required' => 'Поле "ФИО" не может быть пустым.',
                'email.email' => 'В поле "Адрес электронной", должен быть действительный адрес электронной почты.',
                'phone.required' => 'Поле "Контактный телефон" не может быть пустым.',
                'adress.required' => 'Поле "Обратный адрес (с почтовым индексом)" не может быть пустым.',
                'subject1.required' => 'Поле "Тема обращения" не может быть пустым.',
                'messages.required' => 'Поле "Текст обращения" не может быть пустым.'
            ];
            //Validol
            $this->validate($result, $vRules, $vMessage);

            //Faq
            $faq = new PersonFaq;
            $faq->person = $result->fio;
            $faq->person_email = $result->email;
            $faq->faq_in_text = $result->messages;
            $faq->status = '0';
            $faq->geoip = \Request::ip(); 
            $faq->save();

            //Mail
            $fio = $result->fio;
            $email = $result->email;
            $phone = $result->phone;
            $adress = $result->adress;
            $subject1 = $result->subject1;
            $messages = $result->messages;
            $geoip = \Request::ip();

            Mail::to('ompts@obninsk.ru')
                ->bcc(['kalva@obninsk.ru','pen07@obninsk.ru','tatycherkas@yandex.ru'])
                ->send(new MailFaq($fio, $email, $phone, $adress, $subject1, $messages, $geoip));
            Session::flash('success','Ваше электронное обращение отправлено!');
        return redirect()->route('feedback');
    }

    public function getSend_Pu(Request $result)
    {
        $vRules = [
            'address' => 'required',
            'phone' => 'required'
        ];

        $vMessage =
        [
            'address.required' => 'Поле "Адрес" не может быть пустым.',
            'phone.required' => 'Поле "Телефон" не может быть пустым.'
        ];
        //Validol
        $this->validate($result, $vRules, $vMessage);

       //Mail
        $address = $result->address;
        $phone = $result->phone;
        $pu_num1 = $result->pu_num1;
        $pu_num_data1 = $result->pu_num_data1;
        $pu_num2 = $result->pu_num2;
        $pu_num_data2 = $result->pu_num_data2;
        $pu_num3 = $result->pu_num3;
        $pu_num_data3 = $result->pu_num_data3;
        $geoip = \Request::ip();

        Mail::to('48439teplo@mail.ru') //48439teplo@mail.ru
            ->bcc(['pen07@obninsk.ru'])
            ->send(new MailPu($address, $phone, $pu_num1, $pu_num2, $pu_num3, $pu_num_data1, $pu_num_data2, $pu_num_data3, $geoip));
        Session::flash('success','Показания по прибору учета отправлены!');
    return redirect()->route('feedback.pu');
    }

    public function getFaq()
    {
        return view('site.faq.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('PersonFaq', PersonFaq::orderBy('id', 'desc')->paginate(7));
    }

    public function getRcoMapsId($id)
    {
            $maps = RcoMap::where('rco_id', $id)->get();
        return $maps;
    }

    public function getFaqPdf($id)
    {
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($this->getFaqPdfHtml($id));
        return $pdf->stream();
    }

    public function getFaqPdf2($id)
    {
            $PersonFaq = PersonFaq::find($id);
            $pdf = PDF::loadView('site.faq.pdf', compact('PersonFaq'));
        return $pdf->stream();
    }

    public function getFaqPdfHtml($id)
    {
            $pFaq = PersonFaq::find($id);
            $out_pdf = '
            <!DOCTYPE html>
            <html lang="ru">
            <head>
                <meta charset="utf-8">
            </head>
            <style>
                body {font-family: DejaVu Sans, sans-serif;  font-style:normal; font-size:10pt; color:#000;}
            </style>
            <body>
            <table style="width: 704px;" border="0">
            <tbody>
                <tr>
                    <td style="width: 334.733px; text-align: center;">
                        <b>Российская Федерация<br />
                         Калужская область<br />
                         249038, г.Обнинск</b><br /><br />
                         <b>Муниципальное предприятие <br />«Теплоснабжение»</b><br />
                         Коммунальный пр., 21<br />
                         тел. (484)396-37-51, факс (484)396-95-20<br />
                         e-mail: ompts@obninsk.ru<br />
                         <u>Электронное обращение от '.date("d.m.Y", strtotime($pFaq->faq_in_date)).'</u>
                    </td>
                    <td style="width: 349.267px; text-align: center;">
                        <u>ФИО:</u> '.$pFaq->person.'<br />
                    </td>
                </tr>
            </tbody>
            </table><br />
            <h3 style="text-align: center;">Вопросы и Ответы на обращения граждан в МП Теплоснабжение г.Обнинск</h3><br><br>
            <b><u>Вопрос</u></b><br /><blockquote>'.$pFaq->faq_in_text.'</blockquote><br /><br /><br />
            <b><u>Ответ</u></b><br />
            '.$pFaq->faq_out_text.'
            <footer class="entry-footer">
                    <br /><span class="cat-links">'.$pFaq->faq_out_ts.'</span>
                </footer>
            </body>
            </html>
            ';
        return $out_pdf;
    }

    public function getFaqShowId($id)
    {
        return view('site.faq.show')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('PersonFaq', PersonFaq::find($id));
    }

    public function getTchemaShowId($id)
    {
        return view('site.scheme.show')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Tchema', Tchema::find($id));
    }

    public function getScheme()
    {
        return view('site.scheme.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Tchema', Tchema::orderBy('id', 'desc')
            ->get());
    }

    public function getMeteoShowDate(Request $result)
    {
        $v_rules = array(
            'datas' => 'required',
            'datap' => 'required'
        );

        $v_messages = array(
            'datas.required' => 'Не заполнено поле начальная дата',
            'datap.required' => 'Не заполнено поле конечная дата'
        );

        $this->validate($result, $v_rules, $v_messages);

        $datas = strftime('%Y-%m-%d', strtotime($result->datas));
        $datap = strftime('%Y-%m-%d', strtotime($result->datap));

        return view('site.meteo.show')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('Meteoarh', Meteoarh::whereBetween('data_m', [$datas, $datap])->get())
            ->with('TemCount', Meteoarh::whereBetween('data_m', [$datas, $datap])->count('id'))
            ->with('TemSum', Meteoarh::whereBetween('data_m', [$datas, $datap])->where('flag', 1)->avg('tem'))
            ->with('datas', $datas)
            ->with('datap', $datap);
    }

    public function getTraining()
    {
        return view('site.training.index')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('trainings', training::orderBy('id', 'asc')->get());
    }

    public function getTrainingShowId($id) {
            $trainings = training::find($id);
        return view('site.training.show')
            ->with('SiteSetting', SiteSetting::find(1))
            ->with('trainings', $trainings);
    }
}
