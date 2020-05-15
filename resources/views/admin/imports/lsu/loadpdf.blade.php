@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.imports.lsu') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Загрузка квитанций в формате (pdf)</h2></header>
							    <div class="entry-content">
                                    <form id="upload" method="post" action="{{ route('admin.imports.lsu.uploadfilelslsu') }}" class="form-horizontal" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="pfiles" class="col-md-4 col-form-label text-md-right">{{ __('Выбирете файл(ы)') }}</label>
                                            <div class="col-md-8">
                                                <input id="pfile" type="file" class="form-control" name="pfiles[]" multiple>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button  type="submit" class="btn btn-primary btn-sm">
                                                      {{ __('Загрузить') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
