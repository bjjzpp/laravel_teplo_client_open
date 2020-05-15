@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">{{ $Page->title_page }}</h2></header>
								<div class="entry-content">
                                    <form name="pages" method="post" action="{{ route('admin.pages.update', ['id' => $Page->id]) }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <textarea id="full_text" class="form-control{{ $errors->has('slime_text') ? ' is-invalid' : '' }}" name="slime_text" rows="7" cols="180" class="form-control">{{ $Page->slime_text }}</textarea>
                                            @if ($errors->has('full_text'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('slime_text') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <textarea id="full_text" class="form-control{{ $errors->has('full_text') ? ' is-invalid' : '' }}" name="full_text" rows="7" cols="180" class="form-control">{{ $Page->full_text }}</textarea>
                                            @if ($errors->has('full_text'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('full_text') }}</strong>
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