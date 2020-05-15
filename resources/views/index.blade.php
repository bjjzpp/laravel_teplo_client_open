@extends('layouts.site')
@section('content')
	<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h1 class="entry-title"></h1></header>
								<div class="entry-content">
									@if(isset($Page))
										{!! $Page->slime_text !!}
									<br>
										{!! $Page->full_text !!}
									@endif
								</div>
						</article>

						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h1 class="entry-title">Новости</h1></header>
								<div class="entry-content" id="NewsMain">
									@foreach($News as $New)
										<small>{{ \Carbon\Carbon::parse( $New->created_at)->format('d.m.Y') }}<br /><a href="{{ route('news.show', ['id' => $New->id ]) }}">{!! $New->title_news !!}</a></small><br /><br />
									@endforeach
								</div>
						</article>

					</main><!-- #main -->
			</div><!-- #primary -->

	<div id="sidebar-primary" class="widget-area" role="complementary">
		@include('site.includes.lkts')
        <aside id="recent-posts-2" class="widget widget_recent_entries">
            <h2 class="widget-title">Передать показания ПУ</h2>
            <a href="/pu">Сообщить показания счетчика</a>
        </aside>
		<aside id="meta-2" class="widget widget_meta">
			<h2 class="widget-title">Прямые договоры с РСО</h2>
				<div id="RcoTitle">
					@foreach($Rco as $Rcos)
						<small><a href="{{ route('rco.show', ['id' =>$Rcos->id ]) }}">{{ $Rcos->title }}</a></small><br>
					@endforeach
				</div>
        </aside>

        <aside id="meta-2" class="widget widget_meta">
			<h2 class="widget-title">Непосредственное управление</h2>
				<div id="RcoTitle">
					@foreach($Rco1 as $Rcos)
						<small><a href="{{ route('rco.show', ['id' =>$Rcos->id ]) }}">{{ $Rcos->title }}</a></small><br>
					@endforeach
				</div>
		</aside>
	</div></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content -->
	</div></div>

	<div id="featured-content">
		<div class="container">
			<div class="inner-wrapper featured-content-column-2">
				<article>
					<header class="entry-header">
					<h2 class="entry-title">Cхемы, Стандарты </h2></header>
						<div class="entry-content">
							<div id="ChemasTitle" class="mainTitleBlock">
								@foreach($Tchema as $tch)
									<a href="{{ route('scheme.show', ['id' =>$tch->id ]) }}">{{ $tch->name_chema }}</a><br />
								@endforeach
							</div>
						</div>
					</article>
				<article>
					<header class="entry-header"><h2 class="entry-title">Стандарт раскрытия информации<br> о предприятии</h2></header>
						<div class="entry-content">
							<div id="NewsMiniLeft" class="mainTitleBlock">
								@foreach ($StandartBf as $st)
									<a href="{{ route('standart.show', ['id' =>$st->id ]) }}">{!! $st->ztext !!} - {{ $st->yeargoszak->title }}г.</a><br>
								@endforeach
							</div>
						</div>
				</article>
			</div>
		</div>
	</div>

	<div id="featured-content">
		<div class="container">
			<div class="inner-wrapper featured-content-column-3">
				<article>
					<header class="entry-header"><h2 class="entry-title">Электронное обращение</h2></header>
						<div class="entry-content">
							<h3><a class="btn btn-success" href="/feedback">Задать вопрос</a></h3>
						</div>
				</article>
				<article>
					<header class="entry-header"><h2 class="entry-title">Вопросы и Ответы на обращения граждан в МП Теплоснабжение г.Обнинск</h2></header>
						<div class="entry-content">
							<h3><a class="btn btn-success" href="/faq">Смотреть</a></h3>
						</div>
				</article>
				<article>
					<header class="entry-header"><h2 class="entry-title">Телефон горячей линии по вопросам подключения</h2></header>
						<div class="entry-content">
							<h3><a class="btn btn-success" href="skype:+74843964147">+7(484)396-41-47</a></h3>
						</div>
				</article>

			</div>
		</div>
	</div>
@endsection
