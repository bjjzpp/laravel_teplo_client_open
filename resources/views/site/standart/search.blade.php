@extends('layouts.site_bar')

@section('content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('standart') }}">Назад</a><br /><br />
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Результат поиска по разделу: Стандарты раскрытия</h2></header>
								<div class="entry-content">
									@if(count($StandartSearch) > 0)
										@foreach ($StandartSearch as $ss)
											<a href="{{ route('standart.show', ['id' =>$ss->id ]) }}">{!! $ss->ztext !!}</a>
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