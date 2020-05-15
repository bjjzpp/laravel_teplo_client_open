@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
	<div class="container">
		<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
                    <a href="{{ route('admin.home.scheme.edit', ['id' => $Tchema->id ]) }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
                        <header class="entry-header"><h2 class="entry-title"></h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('admin.home.scheme.fiels.store') }}" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('Наименование') }}</label>
                                        <div class="col-md-8">
                                            <input id="id_return" type="hidden" name="id_return" value="{{ $Tchema->id }}">
                                            <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="" size="200px">
                                            @if ($errors->has('fname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('fname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                            <label for="fpatch" class="col-md-4 col-form-label text-md-right">{{ __('Выбирете файл') }}</label>
                                            <div class="col-md-8">
                                                <input id="fpatch" type="file" class="form-control-file {{ $errors->has('fpatch') ? ' is-invalid' : '' }}" name="fpatch" value="" size="200px">
                                                @if ($errors->has('fpatch'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('fpatch') }}</strong>
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
			</div>
@endsection
