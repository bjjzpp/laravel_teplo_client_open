@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.home.goszak') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Добавление</h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('admin.home.goszak.update', ['id' => $Goszak->id]) }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                            <label for="year_id" class="col-md-4 col-form-label text-md-right">{{ __('Год') }}</label>
                                            <div class="col-md-6">
                                                <select name="year_id" id="year_id" class="form-control form-control-sm">
                                                    @foreach($Yeargoszak as $site_year)
                                                        <option value="{{ $site_year->id }}"
                                                            @if($Goszak->yeargoszak->id == $site_year->id)
                                                                selected
                                                            @endif
                                                            >{{ $site_year->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="fz_id" class="col-md-4 col-form-label text-md-right">{{ __('Госзакупки(закон)') }}</label>
                                            <div class="col-md-6">
                                                <select name="fz_id" id="fz_id" class="form-control form-control-sm">
                                                    @foreach($Fz as $site_fz)
                                                        <option value="{{ $site_fz->id }}"
                                                            @if($Goszak->fzs->id == $site_fz->id)
                                                                selected
                                                            @endif
                                                            >{{ $site_fz->fz_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="etorg_id" class="col-md-4 col-form-label text-md-right">{{ __('Госзакупка в электронной форме') }}</label>
                                            <div class="col-md-6">
                                                <select name="etorg_id" id="etorg_id" class="form-control form-control-sm">
                                                    @foreach($SprEtorg as $site_spr_et)
                                                        <option value="{{ $site_spr_et->id }}"
                                                            @if($Goszak->spr_etorgs->id == $site_spr_et->id)
                                                                selected
                                                            @endif
                                                            >{{ $site_spr_et->etorg_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="goszak_types_id" class="col-md-4 col-form-label text-md-right">{{ __('Этап закупки') }}</label>
                                            <div class="col-md-6">
                                                <select name="goszak_types_id" id="goszak_types_id" class="form-control form-control-sm">
                                                    @foreach($GoszakType as $site_gt)
                                                        <option value="{{ $site_gt->id }}"
                                                            @if($Goszak->goszak_types->id == $site_gt->id)
                                                                selected
                                                            @endif
                                                            >{{ $site_gt->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="typegoszak_id" class="col-md-4 col-form-label text-md-right">{{ __('Способ размещения закупки') }}</label>
                                            <div class="col-md-6">
                                                <select name="typegoszak_id" id="typegoszak_id" class="form-control form-control-sm">
                                                    @foreach($Typegoszak as $site_tg)
                                                        <option value="{{ $site_tg->id }}"
                                                            @if($Goszak->typegoszaks->id == $site_tg->id)
                                                                selected
                                                            @endif
                                                            >{{ $site_tg->typename }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="numzak" class="col-md-4 col-form-label text-md-right">{{ __('Номер закупки') }}</label>
                                            <div class="col-md-6">
                                            <input id="numzak" type="text" class="form-control{{ $errors->has('numzak') ? ' is-invalid' : '' }}" name="Goszak" value="{{ $Goszak->Goszak }}" size="200px">
                                                @if ($errors->has('numzak'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('numzak') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                                <label for="etorg_num" class="col-md-4 col-form-label text-md-right">{{ __('Номер на эл.площадке') }}</label>
                                                <div class="col-md-6">
                                                    <input id="etorg_num" type="text" class="form-control{{ $errors->has('etorg_num') ? ' is-invalid' : '' }}" name="etorg_num" value="{{ $Goszak->etorg_num }}" size="200px">
                                                    @if ($errors->has('etorg_num'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('etorg_num') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ztext" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>
                                        <div class="col-md-6">
                                            <textarea id="ztext" class=" form-control{{ $errors->has('ztext') ? ' is-invalid' : '' }}" name="ztext" rows="7" cols="180" class="form-control">{{ $Goszak->ztext }}</textarea>
                                            @if ($errors->has('ztext'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('ztext') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="databegin" class="col-md-4 col-form-label text-md-right">Дата начала</label>
                                        <div class="col-md-6">
                                                <input id="databegin" type="text" data-date-format="dd.mm.yyyy" autocomplete="off" readonly="true" class="form-control" name="databegin" value="{{ \Carbon\Carbon::parse($Goszak->databegin)->format('d.m.Y') }}" size="1px">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dataend" class="col-md-4 col-form-label text-md-right">Дата завершения</label>
                                        <div class="col-md-6">
                                            <input id="dataend" type="text" data-date-format="dd.mm.yyyy" autocomplete="off" readonly="true" class="form-control" name="dataend" value="{{ \Carbon\Carbon::parse($Goszak->dataend)->format('d.m.Y') }}" size="1px">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="datacomm" class="col-md-4 col-form-label text-md-right">Дата работы коммисии</label>
                                            <div class="col-md-6">
                                                <input id="datacomm" type="text" data-date-format="dd.mm.yyyy" autocomplete="off" readonly="true" class="form-control" name="datacomm" value="{{ \Carbon\Carbon::parse($Goszak->datacomm)->format('d.m.Y') }}" size="1px">
                                            </div>
                                    </div>

                                    <b>Документы закупки</b><br>
                                    <div class="text-right">
                                        <a href="{{ route('admin.home.goszak.fiels.create', ['id' => $Goszak->id]) }}" class="pull-right btn btn-outline-dark btn-sm">
                                          Добавить документ
                                        </a>
                                    </div><br />
                                    @if(count($Goszak->fz223_files) > 0)
                                        <table class="table thead-light table-sm">
                                                <tr>
                                                    <th scope="col">Наименование</th>
                                                    <th scope="col">Дата</th>
                                                    <th scope="col">Актуальность документа</th>
                                                    <th scope="col">Управление</th>
                                                </tr>
                                                    @foreach($Goszak->fz223_files as $af)
                                                        <tr><td>{{ $af->nfiles }}</td><td>{{ \Carbon\Carbon::parse($af->dfiles)->format('d.m.Y') }}</td>
                                                            <td>@if($af->oldfile > 0) <font color="geen">Действующий</font> @else <font color="red">Недействующий</font> @endif
                                                            <br /><a href="#">Да</a>&nbsp;&nbsp;<a href="#">Нет</a>
                                                            </td>
                                                            <td><a href="{{ Storage::url($af->pfiles) }}" class="btn btn-outline-info btn-sm">
                                                                Просмотр
                                                            </a>
                                                            <a href="{{ route('admin.home.goszak.fiels.delete', ['id' => $af->id]) }}" class="btn btn-outline-danger btn-sm">
                                                                Х
                                                            </a>
                                                        </td></tr>
                                                    @endforeach
                                        </table>
                                    @endif

                                    <b>Реестр договоров</b><br>
                                    <div class="text-right">
                                        <a href="{{ route('admin.home.goszak.dog.create', ['id' => $Goszak->id]) }}" class="pull-right btn btn-outline-dark btn-sm">
                                          Добавить договор
                                        </a>
                                    </div><br />
                                    @if(count($Goszak->fz223_contracts) > 0)
                                        <table class="table thead-light table-sm">
                                                <tr>
                                                    <th scope="col">Наименование</th>
                                                    <th scope="col">Номер договора</th>
                                                    <th scope="col">Управление</th>
                                                </tr>
                                                    @foreach($Goszak->fz223_contracts as $af)
                                                        <tr><td>{{ $af->lot }}</td>
                                                        <td>{{ $af->link_lot }}</td>
                                                        <td><a href="{{ $Goszak->fzs->url_fz_doc.$af->link_lot }}" target="_blank" class="btn btn-outline-info btn-sm">
																														Просмотр
																														</a>
                                                            <a href="{{ route('admin.home.goszak.dog.delete', ['id' => $af->id]) }}" class="btn btn-outline-danger btn-sm">
                                                            	Х
                                                            </a>
                                                        </td></tr>
                                                    @endforeach
                                        </table>
                                    @endif
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                              {{ __('Сохранить') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
								</div><br />
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
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 0
};
	var today = new Date();
    $("#databegin").datepicker({
			format: "dd.mm.yyyy",
  		todayHighlight: true,
  		autoclose: true,
			language:'ru'
		});
    $("#dataend").datepicker({
			format: "dd.mm.yyyy",
  		todayHighlight: true,
  		autoclose: true,
			language:'ru'
		});
    $("#datacomm").datepicker({
			format: "dd.mm.yyyy",
  		todayHighlight: true,
  		autoclose: true,
			language:'ru'
		});
		$('#databegin, #dataend, #datacomm').datepicker('setDate', today);
  });
</script>

    <script type="text/javascript">
        tinymce.init({
        selector: 'textarea',
        language: 'ru',
        height: 300,
        width: 800,
        menubar: true,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
    ],
    toolbar: '| undo redo | formatselect | ' +
    '| forecolor code | bold italic underline backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat',
    content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
    </script>
@endsection
