@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.home.news') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Добавление</h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('admin.home.news.store') }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                        <label for="title_news" class="col-md-4 col-form-label text-md-right">{{ __('Заголовок') }}</label>
                                        <div class="col-md-6">
                                            <input id="title" type="text" class="form-control{{ $errors->has('title_news') ? ' is-invalid' : '' }}" name="title_news" value="" size="200px">
                                            @if ($errors->has('title_news'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('title_news') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="body_news" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>
                                        <div class="col-md-6">
                                            <textarea aria-multiline="true" id="body_news" class=" form-control{{ $errors->has('body_news') ? ' is-invalid' : '' }}" name="body_news" rows="7" cols="180" class="form-control"></textarea>
                                            @if ($errors->has('body_news'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('body_news') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <span aria-hidden="true"> {{ __('Сохранить') }}</span>
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