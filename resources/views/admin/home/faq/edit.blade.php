@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.home.faq') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Ответ</h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('admin.home.faq.update', ['id' => $PersonFaq->id]) }}" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="label_id" id="label_id" class="col-md-4 col-form-label text-md-right">№: {{$PersonFaq->id}}</label>
                                    </div>

                                    <div class="form-group row">
                                        <label for="faq_out_ts" class="col-md-4 col-form-label text-md-right">{{ __('Ответил') }}</label>
                                        <div class="col-md-6">
                                            <input id="faq_out_ts" type="text" class="form-control{{ $errors->has('faq_out_ts') ? ' is-invalid' : '' }}" name="faq_out_ts" value="{{ $PersonFaq->faq_out_ts }}">
                                            @if ($errors->has('faq_out_ts'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('faq_out_ts') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="faq_out_text" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>
                                        <div class="col-md-6">
                                            <textarea id="faq_out_text" class=" form-control{{ $errors->has('faq_out_text') ? ' is-invalid' : '' }}" name="faq_out_text" rows="7" cols="180" class="form-control">{{ $PersonFaq->faq_out_text }}</textarea>
                                            @if ($errors->has('faq_out_text'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('faq_out_text') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="faq_out_date" class="col-md-4 col-form-label text-md-right">{{ __('Дата ответа') }}</label>
                                            <div class="col-md-6">
                                                <input id="faq_out_date" data-date-format="dd.mm.yyyy" type="text" autocomplete="off" readonly="true" class="form-control{{ $errors->has('faq_out_date') ? ' is-invalid' : '' }}" name="faq_out_date" value="{{ \Carbon\Carbon::parse($PersonFaq->faq_out_date)->format('d.m.Y') }}" size="1px">
                                                @if ($errors->has('faq_out_date'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('faq_out_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                    </div>
                                    @if(empty($PersonFaq->faq_out_files))
                                    <div class="form-group row">
                                        <label for="faq_out_files" class="col-md-4 col-form-label text-md-right">{{ __('Выбирете скан-ответа') }}</label>
                                        <div class="col-md-8">
                                            <input id="faq_out_files" type="file" class="form-control{{ $errors->has('faq_out_files') ? ' is-invalid' : '' }}" name="faq_out_files" value="">
                                            @if ($errors->has('faq_out_files'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('faq_out_files') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                <table class="table thead-light table-sm">
                                    <tr>
                                        <th scope="col">Наименование</th>
                                        <th scope="col">Управление</th>
                                    </tr>
                                        <tr><td><a href="{{ Storage::url($PersonFaq->faq_out_files) }}">Скан-копия ответа {{$PersonFaq->faq_out_files}}</a></td>
                                        <td>
                                            <a href="#" class="btn btn-outline-danger btn-sm">
                                                <span aria-hidden="true">Х</span>
                                            </a>
                                        </td></tr>
                                </table>
                                @endif
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <span aria-hidden="true"> {{ __('Сохранить') }}</span>
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
  $( function() {
    $( "#faq_out_date" ).datepicker();
  } );
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
