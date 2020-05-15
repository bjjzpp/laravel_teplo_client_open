<a href="/pm" class="{{ Request::is('pm') ? 'nav_top_lkts' : '' }}">Сообщения</a><br>
<a href="/edo" class="{{ Request::is('edo') ? 'nav_top_lkts' : '' }}">Электронные заявления</a><br>
<a href="/ls" class="{{ Request::is('ls') ? 'nav_top_lkts' : '' }}">Лицевой счет</a><br>
<hr>
<a href="#">Профиль пользователя</a><br>
 <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
