@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
          <a href="{{ route('index') }}">Назад</a><br /><br />
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">Электронное обращение в МП Теплоснабжение г.Обнинск</h2></header>
                        <div class="entry-content">
                            <p>Этот раздел официального сайта является дополнительным средством для обращения граждан в МП Теплоснабжение г.Обнинск.</p><br />
                            <p>Обращения граждан рассматриваются в соответствии с <a href="http://teplo.obninsk.ru/files/fz_59_02052006.pdf" target="_blank">Федеральным законом от 02.05.2006 № 59-ФЗ
                            "О порядке рассмотрения обращений граждан Российской Федерации"</a>.</p><br />
                            <p>Всоответствии с пунктом 3 статьи 7 указанного Федерального закона в  обращении в форме электронного документа гражданин в обязательном порядке указывает свои фамилию,
                            имя, отчество (последнее - при наличии), адрес электронной почты, если ответ должен быть направлен в форме электронного документа, и почтовый  адрес, если ответ должен
                            быть направлен в письменной форме. </p><br />
                            <p>Информация о персональных данных авторов обращений, направленных в электронном виде, хранится и обрабатывается с соблюдением требований российского законодательства о
                            персональных данных <a href="http://teplo.obninsk.ru/files/fz_152_27072006.pdf" target="_blank">Федеральным законом от 27.07.2006 № 152-ФЗ "О персональных данных"</a>.</p><br />
                            <p>В целях исполнения <a href="http://teplo.obninsk.ru/files/ukaz_prezudenta_rf_171_17042017.pdf" target="_blank">Указа Президента Российской Федерации от 17.04.2017
                            года № 171 "О мониторинге и анализе результатов рассмотрения обращений граждан и организаций"</a> МП "Теплоснабжение" разместило на своем официальном сайте
                            счетчик обращений, сведения о котором включены в единый реестр российских программ для электронных вычислительных машин и баз данных.</p><br /><br />
                                <h3>Написать обращение</h3>
                                <form name="feedback" enctype='multipart/form-data' method="post" action="{{ route('send') }}" class="form-horizontal" >
																	{{ csrf_field() }}
																	<div class="form-group row">
																			<label for="fio" class="col-md-4 col-form-label text-md-right">{{ __('Ф.И.О. (*)') }}</label>
																			<div class="col-md-6">
																					<input id="fio" type="text" class="form-control{{ $errors->has('fio') ? ' is-invalid' : '' }}" name="fio" value="" size="60">
																					@if ($errors->has('fio'))
																							<span class="invalid-feedback" role="alert">
																									<strong>{{ $errors->first('fio') }}</strong>
																							</span>
																					@endif
																			</div>
																	</div>
																	<div class="form-group row">
																			<label for="fio" class="col-md-4 col-form-label text-md-right">{{ __('Адрес электронной почты (*)') }}</label>
																			<div class="col-md-6">
																					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" size="60">
																					@if ($errors->has('email'))
																							<span class="invalid-feedback" role="alert">
																									<strong>{{ $errors->first('email') }}</strong>
																							</span>
																					@endif
																			</div>
																	</div>
																	<div class="form-group row">
																			<label for="fio" class="col-md-4 col-form-label text-md-right">{{ __('Контактный телефон (*)') }}</label>
																			<div class="col-md-6">
																					<input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="" size="60">
																					@if ($errors->has('phone'))
																							<span class="invalid-feedback" role="alert">
																									<strong>{{ $errors->first('phone') }}</strong>
																							</span>
																					@endif
																			</div>
																	</div>
																	<div class="form-group row">
																			<label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Обратный адрес (с почтовым индексом) (*)') }}</label>
																			<div class="col-md-6">
																					<input id="adress" type="text" class="form-control{{ $errors->has('adress') ? ' is-invalid' : '' }}" name="adress" value="" size="60">
																					@if ($errors->has('adress'))
																							<span class="invalid-feedback" role="alert">
																									<strong>{{ $errors->first('adress') }}</strong>
																							</span>
																					@endif
																			</div>
																	</div>
																	<div class="form-group row">
																			<label for="subject1" class="col-md-4 col-form-label text-md-right">{{ __('Тема обращения (*)') }}</label>
																			<div class="col-md-6">
																					<input id="subject1" type="text" class="form-control{{ $errors->has('subject1') ? ' is-invalid' : '' }}" name="subject1" value="" size="60">
																					@if ($errors->has('subject1'))
																							<span class="invalid-feedback" role="alert">
																									<strong>{{ $errors->first('subject1') }}</strong>
																							</span>
																					@endif
																			</div>
																	</div>
																	<div class="form-group row">
																			<label for="subject1" class="col-md-4 col-form-label text-md-right">{{ __('Текст обращения (*)') }}</label>
																			<div class="col-md-6">
																					<textarea id="messages" name="messages" rows="16" cols="58" class="form-control{{ $errors->has('messages') ? ' is-invalid' : '' }}"></textarea>
																					@if ($errors->has('messages'))
																							<span class="invalid-feedback" role="alert">
																									<strong>{{ $errors->first('messages') }}</strong>
																							</span>
																					@endif
																			</div>
																	</div>
																	<div class="form-group row">
																			<label for="g-recaptcha" class="col-md-4 col-form-label text-md-right">{{ __('Код проверки (*)') }}</label>
																			<div class="col-md-6">
																					<div class="g-recaptcha" data-sitekey="6Lc5VjQUAAAAAG5soNXQyJZpl4l8vvpZF4IzP-PQ"></div>
																			</div>
																	</div>
																	<div class="form-group row mb-0">
																			<div class="col-md-6 offset-md-4">
																					<button type="submit" name="submit" class="btn btn-primary btn-sm">
																							<span aria-hidden="true"> {{ __('Отправить') }}</span>
																					</button>
																			</div>
																	</div>
                                </form>
                                <script src='https://www.google.com/recaptcha/api.js'></script>
                		</div>
	            <footer class="entry-footer">
                    <br /<b><u>Звездочкой (*) отмечены поля, обязательные для заполнения.</u></b>
		        </footer>
            </article>
		</main>
	</div>
  </div>
 </div>
</div>
@endsection
