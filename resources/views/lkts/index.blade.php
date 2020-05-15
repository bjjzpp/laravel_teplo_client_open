@extends('layouts.site_bar_lkts')
@section('content')
	<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Добро пожаловать в личный кабинет МП Теплоснабжение г.Обнинск!</h2></header>
								<div class="entry-content">
                                    <h3>Вы можете пользоваться следующими услугами:<br />
                                        &nbsp;&nbsp;1)&nbsp;Сообщения.<br />
                                        &nbsp;&nbsp;2)&nbsp;Электронные заявления.<br />
                                        &nbsp;&nbsp;3)&nbsp;Лицевой счет.</h3>
                                        <br /><b>Расширенная информация</b>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Сообщения</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#pages" role="tab" aria-controls="pages" aria-selected="false">Электронные заявления</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#lkts" role="tab" aria-controls="lkts" aria-selected="false">Лицевой счет</a>
                                                </li>
                                              </ul>
                                              <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab"><br />
                                                    <p>
                                                        Обмен сообщения с личном кабинете. Вопросы и отвемы.
                                                    </p>
                                                    <span>
                                                        <a href="/pm"><strong>Перейти к Сообщениям</strong></a>
                                                    </span>
                                                </div>
                                                <div class="tab-pane fade" id="pages" role="tabpanel" aria-labelledby="pages-tab"><br />
                                                    <p>
                                                        Подача электронных заявлений на подключение к сетям теплоснабжения.
                                                    </p>
                                                    <span>
                                                        <a href="/edo"><strong>Перейти к Электронным заявлениям</strong></a>
                                                    </span>
                                                </div>
                                                <div class="tab-pane fade" id="lkts" role="tabpanel" aria-labelledby="lkts-tab"><br />
                                                    <p>
                                                        Подключение лицевого счета, для получения квитанций в электронном виде, подача в МП Теплоснабжение данный за отчетный период по приборам учета.
                                                        Отображение данных по договорам, актам ввода прибора учета и т.д..
                                                    </p>
                                                    <span>
                                                        <a href="/ls"><strong>Перейти к Лицевому счету</strong></a>
                                                    </span>
                                                </div>
                                              </div>
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection

@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Административный доступ</h2></header>
								<div class="entry-content">
								  <ul class="nav nav-tabs" id="myTab" role="tablist">
								    <li class="nav-item">
								      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Основное</a>
								    </li>
								    <li class="nav-item">
								      <a class="nav-link" id="pages-tab" data-toggle="tab" href="#pages" role="tab" aria-controls="pages" aria-selected="false">Страницы</a>
								    </li>
								    <li class="nav-item">
								      <a class="nav-link" id="lkts-tab" data-toggle="tab" href="#lkts" role="tab" aria-controls="lkts" aria-selected="false">Личный кабинет</a>
								    </li>
									<li class="nav-item">
										 <a class="nav-link" id="spr-tab" data-toggle="tab" href="#spr" role="tab" aria-controls="spr" aria-selected="false">Справочники</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="imp_exp-tab" data-toggle="tab" href="#imp_exp" role="tab" aria-controls="imp_exp" aria-selected="false">Импорт / Экспорт</a>
                                   </li>
									 <li class="nav-item">
										<a class="nav-link" id="setup-tab" data-toggle="tab" href="#setup" role="tab" aria-controls="setup" aria-selected="false">Настройки</a>
									</li>
								  </ul>
								  <div class="tab-content" id="myTabContent">
								    <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab"><br />
											<table class="table table-borderless">
												<tbody>
												<tr>
												<td><a href="{{ route('admin.home.rco') }}" title="Прямые договора с РСО"><img src="{{ asset('images/admin/sections.gif') }}" /><br />Прямые договора с РСО</a></td>
													<td><a href="{{ route('admin.home.goszak') }}" title="Госзакупки"><img src="{{ asset('images/admin/fz223.gif') }}" /><br />Госзакупки</a></td>
													<td><a href="{{ route('admin.home.standart') }}" title="Стандарты раскрытия"><img src="{{ asset('images/admin/reviews.gif') }}" /><br />Стандарты раскрытия</a></td>
													<td><a href="{{ route('admin.home.abon') }}" title="Абонентам"><img src="{{ asset('images/admin/authors.gif') }}" /><br />Абонентам</a></td>
												</tr>
												<tr>
													<td><a href="{{ route('admin.home.conn_consumers') }}" title="Подключение потребителей"><img src="{{ asset('images/admin/groups.gif') }}" /><br />Подключение потребителей</a></td>
													<td><a href="#" title="Метео-данные"><img src="{{ asset('images/admin/weblinks.gif') }}" /><br />Метео-данные</a></td>
													<td><a href="{{ route('admin.home.about') }}" title="О предприятии"><img src="{{ asset('images/admin/sections.gif') }}" /><br />О предприятии</a></td>
													<td><a href="{{ route('admin.home.faq') }}" title="Вопросы и ответы Faq"><img src="{{ asset('images/admin/faq.gif') }}" /><br />Вопросы и ответы Faq</a></td>
												</tr>
												<tr>
													<td><a href="{{ route('admin.home.scheme') }}" title="Схемы"><img src="{{ asset('images/admin/preferences.gif') }}" /><br />Схемы</a></td>
													<td><a href="{{ route('admin.home.pay') }}" title="Способы оплаты"><img src="{{ asset('images/admin/banners.gif') }}" /><br />Способы оплаты</a></td>
													<td><a href="{{ route('admin.home.news') }}" title="Новости"><img src="{{ asset('images/admin/newsletter.gif') }}" /><br />Новости</a></td>
												</tr>
												</tbody>
											</table>
								    </div>
								    <div class="tab-pane fade" id="pages" role="tabpanel" aria-labelledby="pages-tab"><br />
											<table class="table table-borderless">
													<thead>
															<th>Наименование</th>
															<th>Управление</th>
													</thead>
													<tbody>
															@foreach ($Page as $p)
																	<tr><td>{!! $p->title_page !!}</td><td><a href="{{ route('admin.pages.edit', ['id' => $p->id ]) }}" class="btn btn-warning btn-xs">Обновить</a></td></tr>
															@endforeach
													</tbody>
											</table>
										</div>
								    <div class="tab-pane fade" id="lkts" role="tabpanel" aria-labelledby="lkts-tab"><br />
											<table class="table table-borderless">
													<tbody>
													<tr>
													<td><a href="{{ route('admin.lkts.pm') }}" title="ЛК сообщения"><img src="{{ asset('images/admin/newsletter.gif') }}" /><br />ЛК сообщения</a></td>
                                                    <td><a href="{{ route('admin.lkts.edo') }}" title="ЛК ЭДО"><img src="{{ asset('images/admin/submissions.gif') }}" /><br />ЛК ЭДО</a></td>
                                                    <td><a href="{{ route('admin.lkts.lsu') }}" title="ЛК Л/С"><img src="{{ asset('images/admin/lsu.png') }}" width="64px" height="64px" /><br />ЛК Л/С</a></td>
													</tr>
													</tbody>
												</table>
										</div>
										<div class="tab-pane fade" id="spr" role="tabpanel" aria-labelledby="spr-tab"><br />
											<table class="table table-borderless">
													<tbody>
													<tr>
														<td><a href="{{ route('admin.spr.typegoszaks') }}" title="Тип госзакупок"><img src="{{ asset('images/admin/fztp.png') }}" /><br />Тип госзакупок</a></td>
													</tr>
													</tbody>
												</table>
                                        </div>
                                        <div class="tab-pane fade" id="imp_exp" role="tabpanel" aria-labelledby="imp_exp-tab"><br />
                                            <a href="{{ route('admin.imports.lsu') }}" title="ЛК Л/С">Работа с загрузкой данных Л/С потребителей ЖКУ</a><br />
											<a href="{{ route('admin.imports.lsu_ompts') }}" title="ЛК Л/С">Работа с загрузкой данных Л/С потребителей МП Теплоснабжение</a>
                                                
										</div>
										<div class="tab-pane fade" id="setup" role="tabpanel" aria-labelledby="setup-tab"><br />
											<table class="table table-borderless">
													<tbody>
													<tr>
													<td><a href="{{ route('admin.setup.site', ['id' => 1]) }}" title="Основные настройки"><img src="{{ asset('images/admin/optimize.gif') }}" /><br />Основные настройки</a></td>
													</tr>
													</tbody>
												</table>
										</div>
								  </div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
