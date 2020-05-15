@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.home.scheme') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Редактируем</h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('admin.home.scheme.update', ['id' => $Tchema->id]) }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                    <label for="label_id" id="label_id" class="col-md-4 col-form-label text-md-right">№: {{$Tchema->id}}</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name_chema" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>
                                        <div class="col-md-6">
                                            <textarea id="name_chema" class=" form-control{{ $errors->has('name_chema') ? ' is-invalid' : '' }}" name="name_chema" rows="7" cols="180" class="form-control">{{ $Tchema->name_chema }}</textarea>
                                            @if ($errors->has('name_chema'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name_chema') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <b>Файлы</b><br>
                                    <div class="text-right">
                                        <a href="{{ route('admin.home.scheme.fiels.create', ['id' => $Tchema->id]) }}" class="pull-right btn btn-outline-dark btn-sm">
                                          Добавить файл
                                        </a>
                                    </div><br />
                                    @if(count($Tchema->tchema_files) > 0)
                                        <table class="table thead-light table-sm">
                                                <tr>
                                                    <th scope="col">Наименование</th>
                                                    <th scope="col">Дата</th>
                                                    <th scope="col">Управление</th>
                                                </tr>
                                                    @foreach($Tchema->tchema_files as $af)
                                                        <tr><td>{{ $af->fname }}</td><td>{{ \Carbon\Carbon::parse($af->dfiles)->format('d.m.Y') }}</td><td>
                                                            <a href="{{ Storage::url($af->fpatch) }}" class="btn btn-outline-info btn-sm">
                                                                Просмотр
                                                            </a>
                                                            <a href="{{ route('admin.home.scheme.fiels.delete', ['id' => $af->id]) }}" class="btn btn-outline-danger btn-sm">
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