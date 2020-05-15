@extends('layouts.site_bar_lkts')
@section('content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('ls.edit', ['id' => $LktsLsDog->id_lkts_ls]) }}">Назад</a><br /><br />
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Добавление Договор</h2></header>
								<div class="entry-content">
                                <form name="feedback" method="post" action="{{ route('ls.update_dog', ['id' => $LktsLsDog->id]) }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                        <label for="dognumber" class="col-md-4 col-form-label text-md-right">{{ __('№ договра') }}</label>
                                        <div class="col-md-6">
                                            <input id="id_return" type="hidden" name="id_return" value="{{ $LktsLsDog->id }}">
                                        <input id="dognumber" type="text" class="form-control{{ $errors->has('dognumber') ? ' is-invalid' : '' }}" name="dognumber" value="{{ $LktsLsDog->dognumber }}" size="200px">
                                            @if ($errors->has('dognumber'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('dognumber') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dbegin" class="col-md-4 col-form-label text-md-right">{{ __('Дата начала') }}</label>
                                        <div class="col-md-6">
                                                <input id="dbegin" data-date-format="dd.mm.yyyy" type="text" autocomplete="off" readonly="true" class="form-control {{ $errors->has('dbegin') ? ' is-invalid' : '' }}" name="dbegin" value="{{ \Carbon\Carbon::parse($LktsLsDog->dbegin)->format('d.m.Y')  }}" size="1px">
                                            @if ($errors->has('dbegin'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('dbegin') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dend" class="col-md-4 col-form-label text-md-right">{{ __('Дата окончания ') }}</label>
                                        <div class="col-md-6">
                                            <input id="dend" data-date-format="dd.mm.yyyy" type="text" autocomplete="off" readonly="true" class="form-control {{ $errors->has('dend') ? ' is-invalid' : '' }}" name="dend" value="@if($LktsLsDog->dend == null) @else {{\Carbon\Carbon::parse($LktsLsDog->dend)->format('d.m.Y')}} @endif" size="1px">
                                            @if ($errors->has('dend'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('dend') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <b>Документы</b>
                                    <div class="text-right">
                                            <a href="{{ route('ls.create_dog_file', ['id'=> $LktsLsDog->id])}}" class="pull-right btn btn-outline-dark btn-sm">
                                              Добавить документ
                                            </a>
                                        </div><br />
                                    <table class="table thead-light table-sm">
                                            <tr>
                                                <th scope="col" style="width:55%;">Наименование</th>
                                                <th scope="col">Дата</th>
                                                <th scope="col">Управление</th>
                                            </tr>
                                                @foreach($LktsLsDog->lkts_ls_dog_files as $pu)
                                                <tr>
                                                    <td>{{ $pu->nfiles }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($pu->defiles)->format('d.m.Y') }}</td>
                                                    <td>
                                                        <a href="{{ Storage::url($pu->pfiles) }}" class="btn btn-outline-info btn-sm">
                                                            Просмотр
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                        </table>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-sm">
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
<script>
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
    $("#dend").datepicker({
		format: "dd.mm.yyyy",
  		todayHighlight: true,
  		autoclose: true,
		language:'ru'
    });
    
    $("#dbegin").datepicker({
		format: "dd.mm.yyyy",
  		todayHighlight: true,
  		autoclose: true,
		language:'ru'
	});
  });
</script>
@endsection
