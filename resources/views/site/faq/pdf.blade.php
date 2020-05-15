@extends('layouts.site_pdf')
@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
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
                                        <u>Электронное обращение от {{ \Carbon\Carbon::parse($PersonFaq->faq_in_date)->format('d.m.Y') }}</u>
                                    </td>
                                    <td style="width: 349.267px; text-align: center;">
                                        <span class="author vcard"><br />От: {{ $PersonFaq->person }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table><br />
                    <h3 style="text-align: center;">Вопросы и Ответы на обращения граждан в МП Теплоснабжение г.Обнинск</h3><br>
                        <header class="entry-header"><blockquote><i>{!! $PersonFaq->faq_in_text !!}</i></blockquote></header><br />
                            <div class="entry-content">
                                {!! $PersonFaq->faq_out_text !!}
                            </div>
                    <footer class="entry-footer">
                        <br /><span class="cat-links">{{ $PersonFaq->faq_out_ts }}<br />Дата ответа: <time class="updated">{{ \Carbon\Carbon::parse($PersonFaq->faq_out_date)->format('d.m.Y') }}</time></span>
                    </footer>
                </article>
            </main>
        </div>
    </div>
    </div>
    </div>
@endsection
