@extends('layouts.site')
@section('content')
	<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Госзакупки: ФЗ - 223</h2></header>
							<form class="form-inline" method="GET" action="{{ route('goszak.search') }}">
									<div class="form-group">
										<label class="sr-only" for="exampleInputEmail3">Поиск</label>
										<input type="text" name="search" class="form-control" id="search" placeholder="Введите название закупки..." size="80px">
									</div>
									 &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-info">Поиск</button>
								</form>
								<div class="entry-content">
									@if(isset($Page))
										{!! $Page->slime_text !!}
									<br>
										{!! $Page->full_text !!}
									@endif
                                    <br>
                                        @if(count($Goszak) > 0)
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>Наименование</th>
                                                    <th><center>Отчетный год</center></th>
												</tr>
                                                    @foreach ($Goszak as $gz)
                                                        <tr><td><a href="{{ route('goszak.show', ['id' => $gz->id ]) }}" >{{$gz->typegoszaks->typename }} №:{{$gz->numzak}}, период с {{ \Carbon\Carbon::parse($gz->databegin)->format('d.m.Y') }} по {{ \Carbon\Carbon::parse($gz->dataend)->format('d.m.Y') }}<br>
                                                        {!! $gz->ztext !!}</a></td><td><center>{{ $gz->yeargoszak->title }}</center><br></td></tr>
                                                    @endforeach
                                            </table>
                                            {{ $Goszak->links() }}
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
