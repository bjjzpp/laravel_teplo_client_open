@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.home.rco') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Редактируем</h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('admin.home.rco.update', ['id' => $Rco->id]) }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                    <label for="label_id" id="label_id" class="col-md-4 col-form-label text-md-right">№: {{$Rco->id}}</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Заголовок') }}</label>
                                        <div class="col-md-6">
                                            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $Rco->title }}" size="200px">
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="full_text" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>
                                        <div class="col-md-6">
                                            <textarea id="full_text" class=" form-control{{ $errors->has('full_text') ? ' is-invalid' : '' }}" name="full_text" rows="7" cols="180" class="form-control">{{ $Rco->full_text }}</textarea>
                                            @if ($errors->has('full_text'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('full_text') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    @if($Rco->map != 0)
                                        <b>Яндекс.Карты</b>
                                        <div class="text-right">
                                            <a href="{{ route('admin.home.rco.create_maps', ['id' => $Rco->id]) }}" class="pull-right btn btn-outline-dark btn-sm">
                                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"> Добавить координаты</span>
                                            </a>
                                        </div><br />
                                        @if(count($Rco->rco_maps) > 0)
                                            <table class="table thead-light table-sm">
                                                <tr>
                                                    <th scope="col">Наименование</th>
                                                    <th scope="col">Координаты</th>
                                                    <th scope="col">Управление</th>
                                                </tr>
                                                    @foreach($Rco->rco_maps as $rm)
                                                        <tr><td>{{ $rm->name }}</td>
                                                            <td>{{ $rm->maps }}</td>
                                                            <td><a href="{{ route('admin.home.rco.maps.edit', ['id' => $rm->id]) }}" class="btn btn-outline-info btn-sm" title="Просмотреть файл">
                                                                Просмотр
                                                                </a>
                                                                <a href="{{ route('admin.home.rco.maps.delete', ['id' => $rm->id]) }}" class="btn btn-outline-danger btn-sm">
                                                                  X
                                                                </a>
                                                        </td></tr>
                                                    @endforeach
                                            </table>
                                        @endif
                                    @endif
                                    <b>Файлы</b>
                                    <div class="text-right">
                                        <a href="{{ route('admin.home.rco.fiels.create', ['id' => $Rco->id]) }}" class="pull-right btn btn-light btn-xs">
                                          Добавить файл
                                        </a>
                                    </div><br />
                                    @if(count($Rco->rco_files) > 0)
                                        <table class="table thead-light table-sm">
                                                <tr>
                                                    <th scope="col">Наименование</th>
                                                    <th scope="col">Дата</th>
                                                    <th scope="col">Управление</th>
                                                </tr>
                                                    @foreach($Rco->rco_files as $af)
                                                        <tr><td>{{ $af->nfiles }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($af->dfiles)->format('d.m.Y') }}</td>
                                                            <td>
                                                            <a href="{{ Storage::url($af->pfiles) }}" class="btn btn-outline-info btn-sm">
                                                      				Просмотр
                                                            </a>
                                                            <a href="{{ route('admin.home.rco.fiels.delete', ['id' => $af->id]) }}" class="btn btn-outline-danger btn-sm">
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