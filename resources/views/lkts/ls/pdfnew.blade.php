@extends('layouts.site_pdf')
@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                    <b>{{ $SiteSetting->title }}</b><br />
                    ИНН: {{ $SiteSetting->titleinn }} КПП:{{ $SiteSetting->titlekpp }}<br />
                    Банк: {{ $SprBank->bank }}, БИК: {{ $SprBank->bik }}, р/сч: {{ $SprBank->psh }}, кор/сч: {{ $SprBank->ksh}}<br />
                    Адрес: 249038, Калужская область, г.Обнинск, ул.Коммунальный проезд, д.21<br /><br />
                    <center><b>ПЛАТЕЖНЫЙ ДОКУМЕНТ<br />{{ $LktsLsCharge->title }}</b></center><br />
                    <table width="100%">
                        <tr>
                            <td width="70%">
                                Плательщик: {{ $LktsLs->lastname }} {{ $LktsLs->firstname }} {{ $LktsLs->middlename }}<br />
                                Адрес: Калужская обл., г.Обнинск, {{ $LktsLs->rco_maps->name }}, кв. {{ $LktsLs->office }}<br />
                                Л/С: <u>{{ $LktsLs->ls }}</u><br />
                                Задолжность за предыдущий период, руб.: {{ number_format($LktsLsCharge->debt, 2, ',', '') }} (руб.)<br />
                                Аванс на начало периода: {{ number_format($LktsLsCharge->advance_pay_begin, 2, ',', '') }} (руб.)<br />
                                Оплачено денежых средств, руб.: {{ number_format($LktsLsCharge->pay, 2, ',', '') }} (руб.)<br />
                                <b>Всего к оплате: {{ number_format($LktsLsCharge->charge, 2, ',', '') }} (руб.)</b>
                            </td>
                            <td width="30%" class="text-center" style="position-right:40px;">
                                <br />
                                <img src="{{ asset('qr_code_open/'.$LktsLs->ls.'.png') }}" width="150px" height="150px" alt="Оплата по QR-Code через приложение Сбербанк.">
                                <br />
                                <b>Всего к оплате: {{ number_format($LktsLsCharge->charge, 2, ',', '') }} (руб.)</b>
                            </td>
                        </tr>
                    </table><br />
                    <p>
                        Ресурсоснабжающая огранизация {{ $SiteSetting->title }}<br />
                        Телефоны для связи:<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;вопросы по начислениям - группа энергосбыта: 396-19-41<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;вопросы по оплате - бухгалтерия: 396-32-30<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;вопросы по приборам учета - АСУ и АД: 396-69-24<br />
                        <br />
                        График работы:<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;понедельник - пятница 7:48 - 16:48<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;обеденный перерыв 12:00 - 13:00<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;выходные дни: суббота, воскресенье<br />
                    </p>
              
                  {{-- 
                    <footer class="entry-footer">
                        <br /><span class="cat-links">{{ $PersonFaq->faq_out_ts }}<br />Дата ответа: <time class="updated">{{ \Carbon\Carbon::parse($PersonFaq->faq_out_date)->format('d.m.Y') }}</time></span>
                    </footer> --}}
                </article>
            </main>
        </div>
    </div>
    </div>
    </div>
@endsection
