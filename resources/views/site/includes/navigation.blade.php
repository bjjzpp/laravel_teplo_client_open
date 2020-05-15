<nav class="navbar navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>&nbsp;Меню
  </button>
  <div class="collapse navbar-collapse" id="navbar1">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/"><b>Главная</b></a>
      </li>
      <li class="nav-item {{ Request::is('news') ? 'active' : '' }}">
           <a class="nav-link" href="/news">Новости</a>
      </li>
      <li class="nav-item {{ Request::is('goszak') ? 'active' : '' }}">
           <a class="nav-link" href="/goszak">Госзакупки</a>
      </li>
      <li class="nav-item {{ Request::is('standart') ? 'active' : '' }}">
           <a class="nav-link" href="/standart">Стандарты раскрытия</a>
      </li>
      <li class="nav-item {{ Request::is('abon') ? 'active' : '' }}">
           <a class="nav-link" href="/abon">Абонентам</a>
      </li>
      <li class="nav-item {{ Request::is('conn_consumers') ? 'active' : '' }}">
           <a class="nav-link" href="/conn_consumers">Подключение потребителей</a>
      </li>
      <li class="nav-item {{ Request::is('pay') ? 'active' : '' }}">
          <a class="nav-link" href="/pay">Оплата</a>
     </li>
      <li class="nav-item {{ Request::is('pts') ? 'active' : '' }}">
           <a class="nav-link" href="/pts">Параметры т/с</a>
      </li>
      <li class="nav-item {{ Request::is('meteo') ? 'active' : '' }}">
           <a class="nav-link" href="/meteo">Метео-данные</a>
      </li>
      <li class="nav-item {{ Request::is('job') ? 'active' : '' }}">
           <a class="nav-link" href="/job">Вакансии</a>
      </li>
      <li class="nav-item {{ Request::is('contacts') ? 'active' : '' }}">
           <a class="nav-link" href="/contacts">Контакты</a>
      </li>
      <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
           <a class="nav-link" href="/about">О предприятии</a>
      </li>
      <li class="nav-item {{ Request::is('training') ? 'active' : '' }}">
        <a class="nav-link" href="/training">Видео-инструкции</a>
      </li>
    </ul>
  </div>
</nav>
