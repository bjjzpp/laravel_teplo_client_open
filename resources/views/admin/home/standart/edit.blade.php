@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.home.standart') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Редактируем</h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('admin.home.standart.update', ['id' => $StandartBf->id]) }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                        <label for="label_id" id="label_id" class="col-md-4 col-form-label text-md-right">№: {{$StandartBf->id}}</label>
                                    </div>
                                    <div class="form-group row">
                                            <label for="year_id" class="col-md-4 col-form-label text-md-right">{{ __('Год') }}</label>
                                            <div class="col-md-6">
                                                <select name="year_id" id="year_id" class="form-control form-control-sm">
                                                    @foreach($Yeargoszak as $site_year)
                                                        <option value="{{ $site_year->id }}"
                                                            @if($StandartBf->yeargoszak->id == $site_year->id)
                                                                selected
                                                            @endif
                                                            >{{ $site_year->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="standart_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Тип стандарта') }}</label>
                                            <div class="col-md-6">
                                                <select name="standart_type_id" id="standart_type_id" class="form-control form-control-sm">
                                                    @foreach($StandartType as $st)
                                                        <option value="{{ $st->id }}"
                                                            @if($StandartBf->standart_type->id == $st->id)
                                                                selected
                                                            @endif
                                                            >{{ $st->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ztext" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>
                                        <div class="col-md-6">
                                            <textarea id="ztext" class=" form-control{{ $errors->has('ztext') ? ' is-invalid' : '' }}" name="ztext" rows="7" cols="180" class="form-control">{{ $StandartBf->ztext }}</textarea>
                                            @if ($errors->has('ztext'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('ztext') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <b>Файлы</b><br>
                                    <div class="text-right">
                                        <a href="{{ route('admin.home.standart.fiels.create', ['id' => $StandartBf->id]) }}" class="pull-right btn btn-outline-dark btn-sm">
                                        	Добавить файл
                                        </a>
                                    </div><br />
                                    @if(count($StandartBf->standart_bf_files) > 0)
                                        <table class="table thead-light table-sm">
                                                <tr>
                                                    <th scope="col">Наименование</th>
                                                    <th scope="col">Дата</th>
                                                    <th scope="col">Управление</th>
                                                </tr>
                                                    @foreach($StandartBf->standart_bf_files as $af)
                                                        <tr><td>{{ $af->nfiles }}</td><td>{{ \Carbon\Carbon::parse($af->dfiles)->format('d.m.Y') }}</td><td>
                                                            <a href="{{ Storage::url($af->pfiles) }}" class="btn btn-outline-info btn-sm">
                                                              Просмотр
                                                            </a>
                                                            <a href="{{ route('admin.home.standart.fiels.delete', ['id' => $af->id]) }}" class="btn btn-outline-danger btn-sm">
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
                                </form><br />
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
@section('script')
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