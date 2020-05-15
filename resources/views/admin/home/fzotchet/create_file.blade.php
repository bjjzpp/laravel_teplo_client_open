@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
	<div class="container">
		<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
                    <a href="{{ route('admin.home.fzotchet.edit', ['id' => $OtchetGoszak->id ]) }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
                        <header class="entry-header"><h2 class="entry-title"></h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('admin.home.fzotchet.fiels.store') }}" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                            <label for="fpatch" class="col-md-4 col-form-label text-md-right">{{ __('Выбирете файл') }}</label>
                                            <div class="col-md-8">
                                                <input id="id_return" type="hidden" name="id_return" value="{{ $OtchetGoszak->id }}">
                                                <input id="pfiles" type="file" class="form-control{{ $errors->has('fpatch') ? ' is-invalid' : '' }}" name="fpatch" value="">
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
                                                <span aria-hidden="true"> {{ __('Сохранить') }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
								</div>
						</article>
					</main><!-- #main -->
			</div>
@endsection
