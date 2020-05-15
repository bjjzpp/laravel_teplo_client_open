@extends('layouts.site_bar')
@section('content')
<div id="featured-content">
	<div class="container">
		<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
						<header class="entry-header"><h2 class="entry-title">Стандарты раскрытия: Информация о раскрытой информации предприятия</h2></header>
						
							<div class="entry-content">
								@if(isset($Page))
									{!! $Page->slime_text !!}
								<br>
									{!! $Page->full_text !!}
								@endif
																	<br>
																	@if(isset($Standart))
																			<table class="table table-borderless">
																					<tr>
																							<th>Наименование</th>
																							<th><center>Отчетный год</center></th>
										</tr>
																							@foreach ($Standart as $st)
																									<tr><td><a href="{{ route('standart.show', ['id' =>$st->id ]) }}" >{!! $st->ztext !!}</a></td><td><center>{{ $st->yeargoszak->title }}</center></td></tr>
																							@endforeach
																			</table>
																			{{ $Standart->links() }}
																	@endif
							</div>
					</article>
				</main><!-- #main -->
		</div><!-- #primary -->

<div id="sidebar-primary" class="widget-area" role="complementary">
	<aside id="meta-2" class="widget widget_meta">
		<h2 class="widget-title">Навигация</h2>
			<a href="/fzplan">План и положение</a><br>
			@foreach ($StandartType as $st)
											<a href="/standart?filter={{ $st->slug }}">{{ $st->title }}</a><br>
							@endforeach
	</aside>
</div></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content -->
</div></div>
@endsection
