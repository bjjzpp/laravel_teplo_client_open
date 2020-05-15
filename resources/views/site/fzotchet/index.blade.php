@extends('layouts.site_bar')
@section('content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Госзакупки: ФЗ - 223</h2></header>
								<div class="entry-content">
									@if(count($OtchetGoszak) > 0)
										<table class="table table-borderless">
											<tr>
												<th>Наименование</th>
											</tr>
												@foreach ($OtchetGoszak as $og)
													<tr><td><a href="{{ route('fzotchet.show', ['id' =>$og->id ]) }}" >
													{!! $og->ztext !!}</a></td></tr>
												@endforeach
										</table>
										{{ $OtchetGoszak->links() }}
									@else
										<i>В данный момент нет данных по запросу.</i>
									@endif
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->

	<div id="sidebar-primary" class="widget-area" role="complementary">
		<aside id="meta-2" class="widget widget_meta">
			<h2 class="widget-title">Навигация</h2>
				<a href="/fzplan">План и положение</a><br>
				    @foreach ($GoszakType as $gt)
                        <a href="/goszak?filter={{ $gt->slug }}">{{ $gt->title }}</a><br>
                    @endforeach
                <a href="/fzotchet">Отчеты</a>
		</aside>
	</div></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content -->
	</div></div>


























@endsection
