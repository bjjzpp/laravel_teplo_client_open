@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
          				<a href="{{ route('lkts') }}">Назад</a><br /><br />
							<article class="page type-page status-publish has-post-thumbnail hentry">
								<header class="entry-header"><h2 class="entry-title">Способы оплаты</h2></header>
                				<div class="text-right">
									<a href="{{ route('admin.home.pay.create') }}" class="pull-right btn btn-outline-success btn-sm">Добавить</a></div>
										<div class="entry-content">
											<div class="entry-content">
												<ul class="nav nav-tabs" id="myTab" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" id="home-tab" data-toggle="tab" href="#pay-sber" role="tab" aria-controls="pay-sber" aria-selected="true">Сбербанк</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="profile-tab" data-toggle="tab" href="#pay-open" role="tab" aria-controls="pay-open" aria-selected="false">Октрытие</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="contact-tab" data-toggle="tab" href="#pay-gis" role="tab" aria-controls="pay-gis" aria-selected="false">ГИС ЖКХ</a>
													</li>
												</ul>
											</div>
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade active show" id="pay-sber" role="tabpanel" aria-labelledby="pay-sber"><br />
													<table class="table table-borderless table-sm">
														<tr>
															<th scope="col" style="width:86%;">Наименование</th>
															<th scope="col">Управление</th>
														</tr>

														@foreach ($Pay as $item)
															@if ($item->id_spr_bank == 1)
																<tr><td>{{ $item->title }}</td><td><a href="{{ route('admin.home.pay.edit', ['id' => $item->id ]) }}" class="btn btn-outline-info btn-sm">Правка</a>&nbsp;<a href="{{ route('admin.home.pay.delete', ['id' => $item->id ]) }}" class="btn btn-outline-danger btn-sm">X</a></td></tr>
															@endif
														@endforeach
													</table>
												</div>
												<div class="tab-pane fade" id="pay-open" role="tabpanel" aria-labelledby="pay-open"><br />
													<table class="table table-borderless table-sm">
														<tr>
															<th scope="col" style="width:86%;">Наименование</th>
															<th scope="col">Управление</th>
														</tr>

														@foreach ($Pay as $item)
															@if ($item->id_spr_bank == 2)
																<tr><td>{{ $item->title }}</td><td><a href="{{ route('admin.home.pay.edit', ['id' => $item->id ]) }}" class="btn btn-outline-info btn-sm">Правка</a>&nbsp;<a href="{{ route('admin.home.pay.delete', ['id' => $item->id ]) }}" class="btn btn-outline-danger btn-sm">X</a></td></tr>
															@endif
														@endforeach
													</table>
												</div>
												<div class="tab-pane fade" id="pay-gis" role="tabpanel" aria-labelledby="pay-gis"><br />
													<table class="table table-borderless table-sm">
														<tr>
															<th scope="col" style="width:86%;">Наименование</th>
															<th scope="col">Управление</th>
														</tr>

														@foreach ($Pay as $item)
															@if ($item->id_spr_bank == 3)
																<tr><td>{{ $item->title }}</td><td><a href="{{ route('admin.home.pay.edit', ['id' => $item->id ]) }}" class="btn btn-outline-info btn-sm">Правка</a>&nbsp;<a href="{{ route('admin.home.pay.delete', ['id' => $item->id ]) }}" class="btn btn-outline-danger btn-sm">X</a></td></tr>
															@endif
														@endforeach
													</table>
												</div>
											</div>
							</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
