<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }} - показания с ПУ за текущий месяц</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A600%2C400%2C400italic%2C300%2C100%2C700%7CMerriweather+Sans%3A400%2C700" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
    <script src="{{ asset('js/jquery-ui-1.12.1.js') }}"></script>
</head>
<body><br /><br /><center>
<table style="width: 704px; border:0px;">
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
             www: teplo.obninsk.ru<br />
             <u>Показания прибора учета - эл.форма с сайта из Личного кабинета</u>
        </td>
        <td style="width: 349.267px; text-align: center;">
            @if(isset($send_db_lkts))
                @foreach ($send_db_lkts as $item)
                    <b>Абонент</b><br />
                    <u>ФИО:</u> {{ $item->lastname }} {{ $item->firstname }} {{ $item->middlename }}<br />
                    <u>Л/С:</u> {{ $item->ls }}<br />
                    <u>Адрес:</u> {{ $item->street }}, {{ $item->office }}<br />
                    <u>Email:</u> {{ $item->email }}
                @endforeach
            @endif
        </td>
    </tr>
</tbody>
</table></center><br />
<h3 style="text-align: center;">Отправка показаний ПУ с Личного Кабинета  МП «Теплоснабжение» г.Обнинск!<br />@foreach($send_db_pu_m as $item) {{ $item->title }} @endforeach г.</h3><br><br>
<center>

    <table class="table thead-light table-sm">
        <tr>
            <th scope="col" style="width:61%;">Наименование ПУ</th>
            <th scope="col">Показания</th>
            <th scope="col">На дату</th>
        </tr>
        @if(isset($send_db_pu))
            @foreach($send_db_pu as $s_db_pu)
                <tr>
                    <td>{{ $s_db_pu->namepu }} ({{ $s_db_pu->numberpu }})</td>
                    <td>{{ $s_db_pu->pu_data }}</td>
                    <td> {{ \Carbon\Carbon::parse($s_db_pu->created_at)->format('d.m.Y') }} г.</td>
                </tr>
            @endforeach
        @endif    
    </table>
</center>
</body>
</html>