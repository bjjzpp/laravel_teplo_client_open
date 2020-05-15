@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.lkts.edo') }}">Назад</a><br /><br />
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Редактируем</h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('admin.lkts.edo.update', ['id' => $LktsEdo->id]) }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                        <label for="label_id" id="label_id" class="col-md-4 col-form-label text-md-right">№: {{ $LktsEdo->id }}</label>
                                    </div>
                                    <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                                        <div class="entry-meta">
                                            <span class="posted-on">Дата вопроса: <time class="entry-date published">{{ \Carbon\Carbon::parse($LktsEdo->edo_date_in)->format('d.m.Y') }}</time></span>
                                            <span class="author vcard">От: {{ $LktsEdo->user->name }}</span>
                                        </div>
                                        <div class="entry-content">
                                            Объект: {{ $LktsEdo->edo_name_object }}
                                        </div>
                                        @if(count($LktsEdo->lkts_edo_files) > 0)
                                            <br /><b>Документы</b><br />
                                            <table class="table table-borderless table-sm">
                                                    <tr>
                                                        <th scope="col" style="width:86%;">Наименование</th>
                                                        <th scope="col">Дата</th>
                                                        <th scope="col">Управление</th>
                                                    </tr>
                                                        @foreach($LktsEdo->lkts_edo_files as $af)
                                                            <tr><td>{{ $af->nfiles }}</td><td>{{ \Carbon\Carbon::parse($af->dfiles)->format('d.m.Y') }}</td>
                                                                <td><a href="{{ Storage::url($af->pfiles) }}" class="btn btn-outline-info btn-sm">
                                                                    Правка
                                                                </a>
                                                                <a href="#" class="btn btn-outline-danger btn-sm">
                                                                   Х
                                                                </a>
                                                            </td></tr>
                                                        @endforeach
                                            </table>
                                        @endif
                                    </article><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                    <div class="form-group row">
                                        <label for="edo_out" class="col-md-4 col-form-label text-md-right">{{ __('Ответ') }}</label>
                                        <div class="col-md-6">
                                            <textarea id="edo_out" class="summernote form-control{{ $errors->has('edo_out') ? ' is-invalid' : '' }}" name="edo_out" rows="7" cols="180" class="form-control">@if($LktsEdo->edo_out != null){{ $LktsEdo->edo_out }} @else @endif</textarea>
                                            @if ($errors->has('edo_out'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('edo_out') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <form name="feedback" method="post" action="{{ route('admin.lkts.edo_log.store') }}" class="form-horizontal" >
                                        <div class="form-group row">
                                            <input id="id_return" type="hidden" name="id_return" value="{{ $LktsEdo->id }}">
                                            <label for="lkts_edo_id" class="col-md-4 col-form-label text-md-right">{{ __('Статус') }}</label>
                                                <div class="col-md-6">
                                                    <select name="lkts_edo_id" id="lkts_edo_id" class="form-control form-control-sm">
                                                        @foreach($LktsStatu as $site_tg)
                                                            <option value="{{ $site_tg->id }}">{{ $site_tg->status }}</option>
                                                        @endforeach
                                                    </select><br />
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                      {{ __('Добавить статус') }}
                                                    </button>
                                                </div>
                                        </div>
                                    </form>
                                    @if(count($LktsEdo->lkts_edo_logs) > 0)
                                            <br /><b>Статусы ЭДО</b><br />
                                            <table class="table thead-light table-sm">
                                                    <tr>
                                                        <th scope="col">Наименование</th>
                                                        <th scope="col">Дата</th>
                                                        <th scope="col">Управление</th>
                                                    </tr>
                                                        @foreach($LktsEdo->lkts_edo_logs as $af)
                                                            <tr><td>
                                                                @foreach ($LktsStatu as $ls)
                                                                    @if($af->status_log_id == $ls->id) {{ $ls->status }} @endif
                                                                @endforeach
                                                            </td><td>{{ \Carbon\Carbon::parse($af->log_date_in)->format('d.m.Y') }}</td>
                                                                <td><a href="#" class="btn btn-outline-danger btn-sm">
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
        menubar: false,
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