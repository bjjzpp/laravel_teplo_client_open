<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }} - Активность в ЛК сайта МП Теплоснабжение г.Обнинск</title>
</head>
<body>
<h2>{{ env('APP_NAME') }} - Активность в ЛК сайта МП Теплоснабжение г.Обнинск</h2><br>
Доброго дня!<br>
Активность на сайте в личном кабинете МП Теплоснабжение г.Обнинск.<br>
Проверьте в административной части сайта поступление: <u>новых сообщений</u> или <u>заявок на подключение</u>.<br><br>
<b><u>Информация</u></b><br>
{{ $messages }}
</body>
</html>