@extends('layouts.site_bar_lkts')
@section('content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('ls.edit', ['id' => $LktsLs->id]) }}">Назад</a><br /><br />
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Добавление Прибора учета</h2></header>
								<div class="entry-content">
                                <form name="feedback" method="post" action="{{ route('ls.store_pu') }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                        <label for="namepu" class="col-md-4 col-form-label text-md-right">{{ __('Наименование ПУ') }}</label>
                                        <div class="col-md-6">
                                            <input id="id_return" type="hidden" name="id_return" value="{{ $LktsLs->id }}">
                                            <input id="namepu" type="text" class="form-control{{ $errors->has('namepu') ? ' is-invalid' : '' }}" name="namepu" value="" size="200px">
                                            @if ($errors->has('namepu'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('namepu') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="numberpu" class="col-md-4 col-form-label text-md-right">{{ __('Номер ПУ') }}</label>
                                        <div class="col-md-6">
                                            <input id="numberpu" type="text" class="form-control{{ $errors->has('numberpu') ? ' is-invalid' : '' }}" name="numberpu" value="" size="200px">
                                            <span id="status"></span>
                                            @if ($errors->has('numberpu'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('numberpu') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dizg" class="col-md-4 col-form-label text-md-right">{{ __('Дата след. поверки ПУ') }}</label>
                                        <div class="col-md-6">
                                            <input id="dizg" data-date-format="dd.mm.yyyy" type="text" autocomplete="off" readonly="true" class="form-control {{ $errors->has('dizg') ? ' is-invalid' : '' }}" name="dizg" value="" size="1px">
                                            @if ($errors->has('dizg'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('dizg') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-sm" id="btn_save">
                                                <span aria-hidden="true"> {{ __('Сохранить') }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </form><br/>
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
@section('script')
<script type="text/javascript">
$(function() {
	$.fn.datepicker.dates['ru'] = {
    days: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
    daysShort: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
    daysMin: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
    months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
    monthsShort: ["Янв ", "Фев ", "Мар", "Апр ", "Май ", "Июн ", "Июл ", "Авг ", "Сен ", "Окт ", "Ноя ", "Дек "],
    today: "Сегодня",
    clear: "Очистка",
    format: "mm.dd.yyyy",
    titleFormat: "MM yyyy",
    weekStart: 0
};
	var today = new Date();
    $("#dizg").datepicker({
		format: "dd.mm.yyyy",
  		todayHighlight: true,
  		autoclose: true,
		language:'ru'
	});

	$('#dizg').datepicker('setDate', today);
  });
</script>
<script type="text/javascript">
    $('#numberpu').on('keyup',function(){
          $value=$(this).val();
              $.ajax({
                  type : 'get',
                  url : '{{route('ls.number.pu.check.system')}}',
                  data:{'numberpu':$value},
                  dataType: 'json',
                      success:function(data){
                         if($value == data[0].numberpu) {
                              $('#btn_save').attr('disabled','disabled');
                              $("#numberpu").addClass("is-invalid");
                              $('#status').html('<small><strong><font color="red">Счетчик с таким номером существует.</font></strong></small>');
                          } else {
                              $("#numberpu").removeClass("is-invalid");
                              $('#btn_save').removeAttr('disabled');
                              $('#status').html('');
                          }
                      }
              });
  });
  </script>
@endsection