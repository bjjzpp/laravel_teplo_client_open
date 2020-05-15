@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
          <a href="{{ route('index') }}">Назад</a><br /><br />
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">Передать показания счетчика в МП Теплоснабжение г.Обнинск</h2></header>
                        <div class="entry-content">
                            <p style="color:red"><b>Внимание!<br>Форма отправки данных показаний с прибора учета только для абонентов на прямых договорах.<br /> Графы <u>Счетчик 1, Счетчик 2, Счетчик 3</u> заполняются
                                по количеству установленный тепло-счетчиков в вашей квартире.</b></p>
                                <p>Передача показаний с прибора учета рекомендуем осуществлять в период c 22 по 30 число текущего месяца.</p><br />
                                <form name="feedback" enctype='multipart/form-data' method="post" action="{{ route('pu_send') }}" class="form-horizontal" > {{-- {{ route('pu') }} --}}
                                {{ csrf_field() }}
                                <div class="card">
                                    <div class="card-header" class="h3">Передать показания</div>
                                        <div class="card-body">
											<div class="form-group row">
												<label for="address" class="col-md-4 col-form-label text-md-right"><h2><small>{{ __('Адрес (*)') }}</small></h2></label>
								        			<div class="col-md-6">
														<input id="ls" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }} form-control-sm" name="address" value="" size="60" maxlength="255">
                                                        <h5><small>Пример: ул. Аксенова, кв. 1</small></h5>
                                                        @if ($errors->has('address'))
													    	<span class="invalid-feedback" role="alert">
														    	<strong>{{ $errors->first('address') }}</strong>
															</span>
														@endif
													</div>
                                            </div>
                                            <div class="form-group row">
												<label for="phone" class="col-md-4 col-form-label text-md-right"><h2><small>{{ __('Контактный телефон (*)') }}</small></h2></label>
													<div class="col-md-6">
														<input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} form-control-sm" name="phone" value="" size="60" maxlength="16">
                                                        <h5><small>Пример: 39-00000</small></h5>
                                                        @if ($errors->has('phone'))
															<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('phone') }}</strong>
											    			</span>
														@endif
													</div>
											</div>
                                            <div class="card">
                                                <div class="card-header small">Счетчик 1</div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="pu_num1" class="col-md-6 col-form-label text-md-right "><h2><small>{{ __('Номер счетчика') }}</small></h2></label>
                                                                <div class="col-md-4">
                                                                    <input id="pu_num1" type="text" class="form-control form-control-sm" name="pu_num1" value="" size="60" maxlength="20">
                                                                </div>
                                                                <label for="pu_num_data1" class="col-md-6 col-form-label text-md-right"><h2><small>{{ __('Текущие показания счетчика') }}</small></h2></label>
                                                                <div class="col-md-4">
                                                                    <input id="pu_num_data1" type="text" class="form-control form-control-sm" name="pu_num_data1" value="" size="60" maxlength="20">
                                                                </div>
                                                    </div>
                                                </div>
                                            </div><br />
                                            <div class="card">
                                                <div class="card-header small">Счетчик 2</div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="pu_num2" class="col-md-6 col-form-label text-md-right"><h2><small>{{ __('Номер счетчика') }}</small></h2></label>
                                                        <div class="col-md-4">
                                                            <input id="pu_num2" type="text" class="form-control form-control-sm" name="pu_num2" value="" size="60" maxlength="20">
                                                        </div>
                                                        <label for="pu_num_data2" class="col-md-6 col-form-label text-md-right"><h2><small>{{ __('Текущие показания счетчика') }}</small></h2></label>
                                                            <div class="col-md-4">
                                                                <input id="pu_num_data2" type="text" class="form-control form-control-sm" name="pu_num_data2" value="" size="60" maxlength="20">
                                                            </div>
                                                    </div>
                                               </div>
                                            </div><br />
                                            <div class="card">
                                                <div class="card-header small">Счетчик 3</div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="pu_num3" class="col-md-6 col-form-label text-md-right"><h2><small>{{ __('Номер счетчика') }}</small></h2></label>                                                                                                <div class="col-md-4">
                                                            <input id="pu_num3" type="text" class="form-control form-control-sm" name="pu_num3" value="" size="60" maxlength="20">
                                                        </div>
                                                        <label for="pu_num_data3" class="col-md-6 col-form-label text-md-right"><h2><small>{{ __('Текущие показания счетчика') }}</small></h2></label>
                                                        <div class="col-md-4">
                                                            <input id="pu_num_data3" type="text" class="small form-control form-control-sm" name="pu_num_data3" value="" size="60" maxlength="20">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br />
											<div class="form-group row">
											    <label for="g-recaptcha" class="col-md-4 col-form-label text-md-right "><h2><small>{{ __('Код проверки (*)') }}</small></h2></label>
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
                		</div></div></div>
	            <footer class="entry-footer">
                     <br /><u>Звездочкой (*) отмечены поля, обязательные для заполнения.</u>
		        </footer>
            </article>
		</main>
	</div>
  </div>
 </div>
</div>
@endsection
