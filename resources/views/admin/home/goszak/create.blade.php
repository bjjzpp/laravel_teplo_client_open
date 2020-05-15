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
                                    <form name="feedback" method="post" action="{{ route('admin.home.goszak.store') }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                            <label for="year_id" class="col-md-4 col-form-label text-md-right">{{ __('Год') }}</label>
                                            <div class="col-md-6">
                                                <select name="year_id" id="year_id" class="form-control form-control-sm">
                                                    @foreach($lkts_ls_pus as $pu)
                                                        <option value="{{ $pu->id }}">{{ $pu->namepu }} ({{ $pu->numberpu }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="fz_id" class="col-md-4 col-form-label text-md-right">{{ __('Госзакупки(закон)') }}</label>
                                            <div class="col-md-6">
                                                <select name="fz_id" id="fz_id" class="form-control form-control-sm">
                                                    @foreach($Fz as $site_fz)
                                                        <option value="{{ $site_fz->id }}">{{ $site_fz->fz_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="etorg_id" class="col-md-4 col-form-label text-md-right">{{ __('Госзакупка в электронной форме') }}</label>
                                            <div class="col-md-6">
                                                <select name="etorg_id" id="etorg_id" class="form-control form-control-sm">
                                                    @foreach($SprEtorg as $site_spr_et)
                                                        <option value="{{ $site_spr_et->id }}">{{ $site_spr_et->etorg_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="goszak_types_id" class="col-md-4 col-form-label text-md-right">{{ __('Этап закупки') }}</label>
                                            <div class="col-md-6">
                                                <select name="goszak_types_id" id="goszak_types_id" class="form-control form-control-sm">
                                                    @foreach($GoszakType as $site_gt)
                                                        <option value="{{ $site_gt->id }}">{{ $site_gt->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="goszak_types_id" class="col-md-4 col-form-label text-md-right">{{ __('Способ размещения закупки') }}</label>
                                            <div class="col-md-6">
                                                <select name="goszak_types_id" id="goszak_types_id" class="form-control form-control-sm">
                                                    @foreach($Typegoszak as $site_tg)
                                                        <option value="{{ $site_tg->id }}">{{ $site_tg->typename }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="numzak" class="col-md-4 col-form-label text-md-right">{{ __('Номер закупки') }}</label>
                                            <div class="col-md-6">
                                                <input id="numzak" type="text" class="form-control{{ $errors->has('numzak') ? ' is-invalid' : '' }}" name="numzak" value="" size="200px">
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
                                                    <input id="etorg_num" type="text" class="form-control{{ $errors->has('etorg_num') ? ' is-invalid' : '' }}" name="etorg_num" value="" size="200px">
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
                                            <textarea id="ztext" class=" form-control{{ $errors->has('ztext') ? ' is-invalid' : '' }}" name="ztext" rows="7" cols="180" class="form-control"></textarea>
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
                                                <input id="databegin" data-date-format="dd.mm.yyyy" type="text" autocomplete="off" readonly="true" class="form-control" name="databegin" value="" size="1px">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dataend" class="col-md-4 col-form-label text-md-right">Дата завершения</label>
                                        <div class="col-md-6">
                                            <input id="dataend" type="text" data-date-format="dd.mm.yyyy" autocomplete="off" readonly="true" class="form-control" name="dataend" value="" size="1px">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="datacomm" class="col-md-4 col-form-label text-md-right">Дата работы коммисии</label>
                                            <div class="col-md-6">
                                                <input id="datacomm" type="text" data-date-format="dd.mm.yyyy" autocomplete="off" readonly="true" class="form-control" name="datacomm" value="" size="1px">
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
			</div><!-- #primary -->
@endsection

@section('script')
<script>
  $(function() {
    $("#databegin").datepicker({locale: 'ru'});
    $("#dataend").datepicker({locale: 'ru'});
    $("#datacomm").datepicker({locale: 'ru'});
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