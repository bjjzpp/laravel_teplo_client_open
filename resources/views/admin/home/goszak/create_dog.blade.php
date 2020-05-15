@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
	<div class="container">
		<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
                    <a href="{{ route('admin.home.goszak.edit', ['id' => $Fz223Contract->id ]) }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
                        <header class="entry-header"><h2 class="entry-title"></h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('admin.home.goszak.dog.store') }}" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="lot" class="col-md-4 col-form-label text-md-right">{{ __('Наименование лота') }}</label>
                                        <div class="col-md-8">
                                            <input id="id_return" type="hidden" name="id_return" value="{{ $Fz223Contract->id }}">
                                            <input id="lot" type="text" class="form-control-file {{ $errors->has('lot') ? ' is-invalid' : '' }}" name="lot" value="" size="90px">
                                            @if ($errors->has('lot'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('lot') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="link_lot" class="col-md-4 col-form-label text-md-right">{{ __('Номер лота') }}</label>
                                            <div class="col-md-8">
                                                <input id="nfiles" type="text" class="form-control-file {{ $errors->has('link_lot') ? ' is-invalid' : '' }}" name="link_lot" value="" size="90px">
                                                @if ($errors->has('link_lot'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('link_lot') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="fz_id" class="col-md-4 col-form-label text-md-right">{{ __('Госзакупки(закон)') }}</label>
                                            <div class="col-md-6">
                                                <select name="fz_id" id="fz_id" class="form-control form-control-sm">
                                                    @foreach($Fz as $site_fz)
                                                        <option value="{{ $site_fz->id }}">{{ $site_fz->fz_name }}</option>
                                                    @endforeach
                                                </select>
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
