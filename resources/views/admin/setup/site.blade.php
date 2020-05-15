@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article  class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Основные настройки</h2></header>
								<div class="entry-content">
                                    <div class="entry-content">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Основное</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="false">Банки</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content" id="myTabContent">
										<div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home"><br />
											<form name="feedback" method="post" action="{{ route('admin.setup.site.update', ['id' => $SiteSetting->id]) }}" class="form-horizontal" >
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Наименование') }}</label>
                                                    <div class="col-md-6">
                                                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $SiteSetting->title }}">
                                                        @if ($errors->has('title'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('title') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="titlefull" class="col-md-4 col-form-label text-md-right">{{ __('Полное наименование') }}</label>
                                                    <div class="col-md-6">
                                                        <textarea id="titlefull" class=" form-control{{ $errors->has('titlefull') ? ' is-invalid' : '' }}" name="titlefull" rows="7" cols="180" class="form-control">{{ $SiteSetting->titlefull }}</textarea>
                                                        @if ($errors->has('titlefull'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('titlefull') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="titleinn" class="col-md-4 col-form-label text-md-right">{{ __('ИНН') }}</label>
                                                    <div class="col-md-6">
                                                        <input id="titleinn" type="text" class="form-control{{ $errors->has('titleinn') ? ' is-invalid' : '' }}" name="titleinn" value="{{ $SiteSetting->titleinn }}">
                                                        @if ($errors->has('titleinn'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('titleinn') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="titlekpp" class="col-md-4 col-form-label text-md-right">{{ __('КПП') }}</label>
                                                    <div class="col-md-6">
                                                        <input id="titlekpp" type="text" class="form-control{{ $errors->has('titlekpp') ? ' is-invalid' : '' }}" name="titlekpp" value="{{ $SiteSetting->titlekpp }}">
                                                        @if ($errors->has('titlekpp'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('titlekpp') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                                    <div class="col-md-6">
                                                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $SiteSetting->email }}">
                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Телефон') }}</label>
                                                    <div class="col-md-6">
                                                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $SiteSetting->phone }}" size="180">
                                                        @if ($errors->has('phone'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="copyright" class="col-md-4 col-form-label text-md-right">{{ __('Копирайт') }}</label>
                                                    <div class="col-md-6">
                                                        <textarea id="copyright" class=" form-control{{ $errors->has('copyright') ? ' is-invalid' : '' }}" name="copyright" rows="7" cols="180" class="form-control">{{ $SiteSetting->copyright }}</textarea>
                                                        @if ($errors->has('copyright'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('copyright') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Адрес') }}</label>
                                                    <div class="col-md-6">
                                                        <textarea id="address" class=" form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" rows="7" cols="180" class="form-control">{{ $SiteSetting->address }}</textarea>
                                                        @if ($errors->has('address'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('address') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="titlepochta" class="col-md-4 col-form-label text-md-right">{{ __('Почтовый адрес') }}</label>
                                                    <div class="col-md-6">
                                                        <textarea id="titlepochta" class=" form-control{{ $errors->has('titlepochta') ? ' is-invalid' : '' }}" name="titlepochta" rows="7" cols="180" class="form-control">{{ $SiteSetting->titlepochta }}</textarea>
                                                        @if ($errors->has('titlepochta'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('titlepochta') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="metas" class="col-md-4 col-form-label text-md-right">{{ __('Мета') }}</label>
                                                    <div class="col-md-6">
                                                        <textarea id="metas" class=" form-control{{ $errors->has('metas') ? ' is-invalid' : '' }}" name="metas" rows="7" cols="180" class="form-control">{{ $SiteSetting->metas }}</textarea>
                                                        @if ($errors->has('metas'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('metas') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="counts" class="col-md-4 col-form-label text-md-right">{{ __('Счетчики') }}</label>
                                                    <div class="col-md-6">
                                                        <textarea id="counts" class=" form-control{{ $errors->has('counts') ? ' is-invalid' : '' }}" name="counts" rows="7" cols="180" class="form-control">{{ $SiteSetting->counts }}</textarea>
                                                        @if ($errors->has('counts'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('counts') }}</strong>
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
                                            </form>
                                        </div>
                                        <div class="tab-pane fade active show" id="bank" role="tabpanel" aria-labelledby="bank"><br />
											<table class="table table-borderless table-sm">
													<tr>
														<th style="width:70%;" scope="col">Наименование</th>
														<th scope="col">БИК</th>
														<th scope="col">Статус</th>
														<th scope="col">Управление</th>
                                                    </tr>
                                                   @foreach($SprBank as $item)
                                                        <tr>
                                                            <td>{{ $item->bank }}</td>
                                                            <td>{{ $item->bik }}</td>
                                                            <td>{{ $item->flag }}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-outline-info btn-sm">Правка</a>
																<a href="#" class="btn btn-outline-danger btn-sm">Х</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
											</table>
                                        </div>
                                    </div>
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