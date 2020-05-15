@extends('layouts.site_bar_lkts')
@section('content')
	<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Новое Сообщение</h2></header>
								<div class="entry-content">
                                    <form action="{{ route('pm.store') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="">Сообщение</label><br>
                                            <textarea name="pm_in" cols="70" rows="7" class="ckeditor form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success pull-right btn-sm">
                                                Отправить
                                            </button>
                                        </div>
                                    </form><br /><br />
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
