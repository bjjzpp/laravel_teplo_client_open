<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }} - Информационное сообщение с сайта МП Теплоснабжение г.Обнинск</title>
</head>
<body>
<h2>{{ env('APP_NAME') }} - Информационное сообщение с сайта МП Теплоснабжение г.Обнинск</h2>
Для перехода в АдминЦентр перейдите по <a href="/lkts"><b>ссылке</b></a>.<br><br>
<b><u>Информация</u></b><br>
{{ $messages }}
</body>
</html>
