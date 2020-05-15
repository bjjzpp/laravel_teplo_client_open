<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }} - Электронное обращение</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A600%2C400%2C400italic%2C300%2C100%2C700%7CMerriweather+Sans%3A400%2C700" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
    <script src="{{ asset('js/jquery-ui-1.12.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
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
             <u>Электронное обращение</u>
        </td>
        <td style="width: 349.267px; text-align: center;">
            <u>ФИО:</u> {{ $fio }}<br />
            <u>Адрес электронной почты:</u> {{ $email }}<br />
            <u>Контактный телефон:</u> {{ $phone }}<br />
            <u>Обратный адрес (с почтовым индексом):</u> {{ $adress }}
        </td>
    </tr>
</tbody>
</table><br />
<h3 style="text-align: center;">Зарегистрировано новое электронное обращение с сайта МП «Теплоснабжение» г.Обнинск!</h3><br><br>
<b><u>Тема обращения</u></b>
{{ $subject1 }} <br /><br /><br />

<b><u>Обращение</u></b><br>
{{ $messages }}
<br /><br />
<small>IP адрес отправителя: <u>{{ $geoip }}</u></small>
</body>
</html>
