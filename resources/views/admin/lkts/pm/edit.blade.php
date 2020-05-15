@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.lkts.pm') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Редактируем</h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('admin.lkts.pm.update', ['id' => $LktsPm->id]) }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                        <label for="label_id" id="label_id" class="col-md-4 col-form-label text-md-right">№: {{ $LktsPm->id }}</label>
                                    </div>
                                    <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                                        <div class="entry-meta">
                                            <span class="posted-on">Дата вопроса: <time class="entry-date published">{{ \Carbon\Carbon::parse($LktsPm->pm_date_in)->format('d.m.Y') }}</time></span>
                                            <span class="author vcard">От: {{ $LktsPm->user->name }}</span>
                                        </div>
                                        <div class="entry-content">
                                            {!! $LktsPm->pm_in !!}
                                        </div>
                                        <br />
                                        @if($LktsPm->status == 0)
                                        <br /><br /><br /><br />
                                    <div class="form-group row">
                                        <label for="pm_out" class="col-md-4 col-form-label text-md-right">{{ __('Ответ') }}</label>
                                        <div class="col-md-6">
                                                <textarea id="pm_out" class=" form-control{{ $errors->has('pm_out') ? ' is-invalid' : '' }}" name="pm_out" rows="7" cols="180" class="form-control">@if($LktsPm->pm_out != null){{ $LktsPm->pm_out }} @else @endif</textarea>
                                                @if ($errors->has('pm_out'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('pm_out') }}</strong>
                                                    </span>
                                                @endif

                                        </div>
                                    </div>
                                     @else
                                     <u>Ответ</u>
                                             {!! $LktsPm->pm_out !!}
                                            @endif
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                @if($LktsPm->status == 0)
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                    {{ __('Сохранить') }}
                                                    </button>
                                                @endif
                                        </div>
                                    </div><br />
                                    </article>
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