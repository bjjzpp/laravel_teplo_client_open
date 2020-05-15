@extends('layouts.site_bar_lkts')
@section('content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                    <a href="{{ route('edo') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Мониторинг заявки</h2></header>
								<div class="entry-content">
                                @if(isset($LktsEdoLog))
									<table class="table thead-light table-sm">
											<tr>
												<th scope="col">Статусы заявки</th>
												<th scope="col">Дата</th>
											</tr>
												@foreach ($LktsEdoLog as $gz)
													<tr><td>{{ $gz->lkts_status->status }}</td>
													<td>{{ \Carbon\Carbon::parse($gz->log_date_in)->format('d.m.Y H:m:s') }}</td></tr>
												@endforeach
										</table>
								@else
									<i>Сообщений нет.</i>
								@endif
								<br /><br />
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
