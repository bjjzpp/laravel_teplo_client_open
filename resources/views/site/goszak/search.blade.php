@extends('layouts.site_bar')

@section('content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('goszak') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Результат поиска по разделу: Госзакупки</h2></header>
								<div class="entry-content">
									@if(count($GoszakSearch) > 0)
										@foreach ($GoszakSearch as $ss)
											<a href="{{ route('goszak.show', ['id' =>$ss->id ]) }}">{!! $ss->ztext !!} - {{ $ss->yeargoszak->title }}г.</a><br /><br />
										@endforeach
									@else
										Поиск не дал результатов!<br />
										Переформулируйте Ваш вопрос и повторите поиск!
									@endif
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->

	<div id="sidebar-primary" class="widget-area" role="complementary">
		<aside id="meta-2" class="widget widget_meta">
			<h2 class="widget-title">Навигация</h2>
				@foreach ($StandartType as $st)
                        <a href="/standart?filter={{ $st->slug }}">{{ $st->title }}</a><br>
                @endforeach
		</aside>
	</div></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content -->
	</div></div>
@endsection
