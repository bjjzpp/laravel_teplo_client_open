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
             <u>Показания прибора учета - эл.форма с сайта</u>
        </td>
        <td style="width: 349.267px; text-align: center;">
            <b>Абонент</b><br />
            <u>Адрес:</u> {{ $address }}<br />
            <u>Контактный телефон:</u> {{ $phone }}<br />
        </td>
    </tr>
</tbody>
</table></center><br />
<h3 style="text-align: center;">Отправка показаний с прибора учета с сайта МП «Теплоснабжение» г.Обнинск!</h3><br><br>
<center>
@if(isset($pu_num1) || isset($pu_num_data1))
    <caption><b>Счетчик 1</b></caption><table style="width: 704px; border:0px;">
    <thead>
        <tr>
            <th>Номер прибора</th> <th>Показания</th>
        </tr>
        </thead>
            <tbody>
                <tr>
                    <td>{{ $pu_num1 }}</td> <td>{{ $pu_num_data1 }}</td>
                </tr>
            <tbody>
            <tfoot>
                <tr>
                    <th colspan="3"><small>Дата отправки показаний прибора учета, текущего месяца: <u>@php echo date("d/m/Y"); @endphp</u></small></th>
                </tr>
        </tfoot>
    </table>
<small>IP адрес отпаравителя: <u>{{ $geoip }}</u></small>
<br /><br />
@endif
@if(isset($pu_num2) || isset($pu_num_data2))
<caption><b>Счетчик 2</b></caption>
<table style="width: 704px; border:0px;">
    <thead>
        <tr>
            <th>Номер прибора</th> <th>Показания</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $pu_num2 }}</td> <td>{{ $pu_num_data2 }}</td>
        </tr>
        <tbody>
            <tfoot>
                <tr>
                    <th colspan="3"><small>Дата отправки показаний прибора учета, текущего месяца: <u>@php echo date("d/m/Y"); @endphp</u></small></th>
                </tr>
        </tfoot>
</table>
<br /><br />
@endif
@if(isset($pu_num3) || isset($pu_num_data3))
<caption><b>Счетчик 3</b></caption>
<table style="width: 704px; border:0px;">
    <thead>
        <tr>
            <th>Номер прибора</th> <th>Показания</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $pu_num3 }}</td> <td>{{ $pu_num_data3 }}</td>
        </tr>
    <tbody>
        <tfoot>
            <tr>
                <th colspan="3"><small>Дата отправки показаний прибора учета, текущего месяца: <u>@php echo date("d/m/Y"); @endphp</u></small></th>
            </tr>
        </tfoot>
</table><br /><br />
<small>IP адрес отправителя: <u>{{ $geoip }}</u></small>
@endif
</center>
</body>
</html>
