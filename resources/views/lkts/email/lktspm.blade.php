<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }} - Сообщение в ЛК сайта МП Теплоснабжение г.Обнинск</title>
</head>
<body>
<h2>{{ env('APP_NAME') }} - Сообщение в ЛК сайта МП Теплоснабжение г.Обнинск</h2><br>
Доброго дня!<br>
На Ваше обращение пришел ответ, в личный кабинет МП Теплоснабжение г.Обнинск.<br>
Для ознакомления с ответом перейдите по <a href="/lkts"><b>ссылке</b></a> в личный кабинет.<br><br>
<b><u>Информация</u></b><br>
{{ $messages }}
</body>
</html>
