@extends('layouts.site_bar_lkts')
@section('content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('ls') }}">Назад</a><br /><br />
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Отправка пин-кода</h2></header>
								<div class="entry-content">
                                    <b>Пин-код для активации Л/С: <u>{{ $lkts_ls->ls }}</u>, отправлен на Ваш email!</b><br /><br />
                                    <a href="{{ route('ls') }}" class="btn btn-outline-success btn-sm">Перейти к Л/С</a>
                                    <br /><br /><br />
								</div>
						</article>
			<br /><br /></div><!-- #primary -->
        </main><!-- #main -->
@endsection