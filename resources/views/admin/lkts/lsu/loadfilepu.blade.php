@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
	<div class="container">
		<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
                    <a href="{{ route('admin.lkts.lsu.edit_pu', ['id' => $id ]) }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
                        <header class="entry-header"><h2 class="entry-title">Добавить документ</h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('admin.lkts.lsu.store_pu_file') }}" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Наименование') }}</label>
                                        <div class="col-md-8">
                                            <input id="id_return" type="hidden" name="id_return" value="{{ $id }}">
                                            <input id="nfiles" type="text" class="form-control-file {{ $errors->has('nfiles') ? ' is-invalid' : '' }}" name="nfiles" value="{{ old('nfiles') }}" size="90px">
                                            @if ($errors->has('nfiles'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nfiles') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                            <label for="pfiles" class="col-md-4 col-form-label text-md-right">{{ __('Выбирете файл') }}</label>
                                            <div class="col-md-8">
                                                <input id="pfiles" type="file" class="form-control{{ $errors->has('pfiles') ? ' is-invalid' : '' }}" name="pfiles" value="{{ old('pfiles') }}">
                                                @if ($errors->has('pfiles'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('pfiles') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="defiles" class="col-md-4 col-form-label text-md-right">{{ __('Дата подписания акта') }}</label>
                                        <div class="col-md-6">
                                        <input id="defiles" data-date-format="dd.mm.yyyy" type="text" autocomplete="off" readonly="true" class="form-control {{ $errors->has('defiles') ? ' is-invalid' : '' }}" name="defiles" value="{{ old('defiles') }}" size="1px">
                                            @if ($errors->has('defiles'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('defiles') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                {{ __('Сохранить') }}
                                            </button>
                                        </div>
                                    </div>
                                </form><br />
								</div>
						</article>
					</main><!-- #main -->
			</div>
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
    $("#defiles").datepicker({
		format: "dd.mm.yyyy",
  		todayHighlight: true,
  		autoclose: true,
		language:'ru'
	});

	$('#defiles').datepicker('setDate', today);
  });
</script>
@endsection