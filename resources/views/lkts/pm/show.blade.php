@extends('layouts.site_bar_lkts')
@section('content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('pm') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Сообщение №: {{ $LktsPm->id }} от {{ \Carbon\Carbon::parse($LktsPm->pm_date_in)->format('d.m.Y  H:i:s') }}</h2></header>
								<div class="entry-content">
									{!! $LktsPm->pm_in !!}
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
