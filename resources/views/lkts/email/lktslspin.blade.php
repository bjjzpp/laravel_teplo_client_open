<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Активация Л/С на сайте {{ env('APP_NAME') }}</title>
</head>
<body>
<h2>Активация Л/С на сайте {{ env('APP_NAME') }}</h2><br />
Доброго дня!<br />
Пин-код активации Л/С <u>{{ $ls }}</u> абонента: {{ $pin }}<br /><br />
Письмо не требует ответа!
</body>
</html>
