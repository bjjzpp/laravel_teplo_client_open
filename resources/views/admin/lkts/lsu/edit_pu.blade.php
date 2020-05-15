@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.lkts.lsu.edit', ['id' => $LktsLs->id_lkts_ls]) }}">Назад</a><br /><br />
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Адрес: {{ $LktsLsAdd->rco_maps->name }}, кв. {{ $LktsLsAdd->office }} / Редактирование Прибора учета</h2></header>
								<div class="entry-content">
                                <form name="feedback" method="post" action="{{ route('admin.lkts.lsu.update_pu', ['id' => $LktsLs->id]) }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                        <label for="namepu" class="col-md-4 col-form-label text-md-right">{{ __('Наименование ПУ') }}</label>
                                        <div class="col-md-6">
                                        <input id="id_return" type="hidden" name="id_return" value="{{ $LktsLs->id_lkts_ls }}">
                                        <input id="namepu" type="text" class="form-control{{ $errors->has('namepu') ? ' is-invalid' : '' }}" name="namepu" value="{{ $LktsLs->namepu }}" size="200px">
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
                                            <input id="numberpu" type="text" class="form-control{{ $errors->has('numberpu') ? ' is-invalid' : '' }}" name="numberpu" value="{{ $LktsLs->numberpu }}" size="200px">
                                            <span id="status"></span>
                                            @if ($errors->has('numberpu'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('numberpu') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dizg" class="col-md-4 col-form-label text-md-right">{{ __('Дата следующей поверки') }}</label>
                                        <div class="col-md-6">
                                        <input id="dizg" data-date-format="dd.mm.yyyy" type="text" autocomplete="off" readonly="true" class="form-control {{ $errors->has('dizg') ? ' is-invalid' : '' }}" name="dizg" value="{{  \Carbon\Carbon::parse($LktsLs->dizg)->format('d.m.Y') }}" size="1px">
                                            @if ($errors->has('dizg'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('dizg') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <b>Документы к Прибору учета</b>
                                    <div class="text-right">
                                            <a href="{{ route('admin.lkts.lsu.loadfilepu', ['id' => $LktsLs->id])}}" class="pull-right btn btn-outline-dark btn-sm">
                                              Добавить документ
                                            </a>
                                        </div><br />
                                    <table class="table thead-light table-sm">
                                            <tr>
                                                <th scope="col" style="width:55%;">Наименование</th>
                                                <th scope="col">Дата</th>
                                                <th scope="col">Управление</th>
                                            </tr>
                                                @foreach($LktsLs->lkts_ls_pu_files as $pu)
                                                <tr>
                                                    <td>{{ $pu->nfiles }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($pu->defiles)->format('d.m.Y') }}</td>
                                                    <td>
                                                        <a href="{{ Storage::url($pu->pfiles) }}" class="btn btn-outline-info btn-sm">
                                                            Просмотр
                                                        </a>
                                                        <a href="#" class="btn btn-outline-danger btn-sm">
                                                            Х
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                        </table>
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
