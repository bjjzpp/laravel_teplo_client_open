@extends('layouts.site_bar_lkts')
@section('content')
<div id="featured-content">
	<div class="container">
		<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
                    <a href="{{ route('ls.dog.edit', ['id' => $LktsLsDog->id ]) }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
                        <header class="entry-header"><h2 class="entry-title"></h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('ls.store_dog_file') }}" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="nfiles" class="col-md-4 col-form-label text-md-right">{{ __('Наименование') }}</label>
                                        <div class="col-md-8">
                                            <input id="id_return" type="hidden" name="id_return" value="{{ $LktsLsDog->id }}">
                                            <input id="nfiles" type="text" class="form-control-file {{ $errors->has('nfiles') ? ' is-invalid' : '' }}" name="nfiles" value="" size="90px">
                                            @if ($errors->has('nfiles'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nfiles') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                            <label for="pfiles" class="col-md-4 col-form-label text-md-right">{{ __('Выбирете файл') }}</label>
                                            <div class="col-md-8">
                                                <input id="pfiles" type="file" class="form-control{{ $errors->has('pfiles') ? ' is-invalid' : '' }}" name="pfiles" value="">
                                                @if ($errors->has('pfiles'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('pfiles') }}</strong>
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