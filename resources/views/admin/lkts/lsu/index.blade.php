@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">ЛК Лицевые счета</h2></header>
									<div class="entry-content">
										<ul class="nav nav-tabs" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="zhku-tab" data-toggle="tab" href="#zhku" role="tab" aria-controls="zhku" aria-selected="true">ЖКУ</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="ompts-tab" data-toggle="tab" href="#ompts" role="tab" aria-controls="ompts" aria-selected="false">ОМПТС</a>
											</li>
										</ul>
										</div>
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade active show" id="zhku" role="tabpanel" aria-labelledby="zhku-tab"><br />
												<ul>
												@foreach($RcoMap as $tik0)
													@if($tik0->ticket_ver == 0)
														<li><a href="{{ route('admin.lkts.lsu.show', ['id' => $tik0->rcomid]) }}">{{ $tik0->street_house }}</a></li>
													@endif
												@endforeach
												</ul>
											</div>
											<div class="tab-pane fade" id="ompts" role="tabpanel" aria-labelledby="ompts-tab"><br />
												<ul>
													@foreach($RcoMap as $tik1)
														@if($tik1->ticket_ver == 1)
															<li><a href="{{ route('admin.lkts.lsu.show', ['id' => $tik1->rcomid]) }}">{{ $tik1->street_house }}</a></li>
														@endif
													@endforeach
												</ul>
											</div>
									    </div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
