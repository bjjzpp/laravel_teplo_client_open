@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Госзакупки</h2></header>
								<div class="text-right">
									<a href="{{ route('admin.home.fzplan') }}" class="btn btn btn-outline-success btn-sm">План госзакупок</a>&nbsp;
									<a href="{{ route('admin.home.fzotchet') }}" class="btn btn btn-outline-success btn-sm">Отчеты</a>&nbsp;
									<a href="{{ route('admin.home.goszak.create') }}" class="btn btn btn-outline-success btn-sm">Добавить госзакупку</a>
								</div>
								<div class="entry-content">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="home-tab" data-toggle="tab" href="#podacha-zayavok" role="tab" aria-controls="podacha-zayavok" aria-selected="true">Подача заявок</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="profile-tab" data-toggle="tab" href="#rabota-komissii" role="tab" aria-controls="rabota-komissii" aria-selected="false">Работа комиссии</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="contact-tab" data-toggle="tab" href="#razmeshchenie-zaversheno" role="tab" aria-controls="razmeshchenie-zaversheno" aria-selected="false">Размещение завершено</a>
										</li>
										<li class="nav-item">
										 <a class="nav-link" id="contact-tab" data-toggle="tab" href="#razmeshchenie-otmeneno" role="tab" aria-controls="razmeshchenie-otmeneno" aria-selected="false">Размещение отменено</a>
									 </li>
									</ul>

									</div>
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade active show" id="podacha-zayavok" role="tabpanel" aria-labelledby="podacha-zayavok-tab"><br />
											<table class="table table-borderless table-sm">
													<tr>
															<th style="width:70%;" scope="col">Наименование</th>
															<th scope="col">Закон</th>
															<th scope="col">Год</th>
															<th scope="col">Управление</th>
													</tr>
															@foreach ($FzPz as $FzPzs)
																	<tr><td>{!! $FzPzs->ztext !!}</td><td><center>{{ $FzPzs->fzs->fz_name }}</center></td>
																			<td><center>{{ $FzPzs->yeargoszak->title }}</center></td>
																			<td><a href="{{ route('admin.home.goszak.edit', ['id' => $FzPzs->id ]) }}" class="btn btn-outline-info btn-sm">
																					Правка
																				</a>
																					<a href="{{ route('admin.home.goszak.delete', ['id' => $FzPzs->id ]) }}" class="btn btn-outline-danger btn-sm">
																						Х
																					</a></td></tr>
															@endforeach
											</table>
											{{ $FzPz->links() }}
										</div>
										<div class="tab-pane fade" id="rabota-komissii" role="tabpanel" aria-labelledby="rabota-komissii-tab"><br />
											<table class="table table-borderless table-sm">
													<tr>
															<th style="width:70%;" scope="col">Наименование</th>
															<th scope="col">Закон</th>
															<th scope="col">Год</th>
															<th scope="col">Управление</th>
													</tr>
															@foreach ($FzRk as $FzRks)
																	<tr><td>{!! $FzRks->ztext !!}</td><td><center>{{ $FzRks->fzs->fz_name }}</center></td><td><center>{{ $FzRks->yeargoszak->title }}</center></td>
																		<td><a href="{{ route('admin.home.goszak.edit', ['id' => $FzRks->id ]) }}" class="btn btn-outline-info btn-sm">Правка</a>
																			<a href="{{ route('admin.home.goszak.delete', ['id' => $FzRks->id ]) }}" class="btn btn-outline-danger btn-sm">Х</a></td></tr>
															@endforeach
											</table>
											{{ $FzRk->links() }}
										</div>
										<div class="tab-pane fade" id="razmeshchenie-zaversheno" role="tabpanel" aria-labelledby="razmeshchenie-zaversheno-tab"><br />
											<table class="table table-borderless table-sm">
													<tr>
															<th style="width:70%;" scope="col">Наименование</th>
															<th scope="col">Закон</th>
															<th scope="col">Год</th>
															<th>Управление</th>
													</tr>
															@foreach ($FzRz as $FzRzs)
																	<tr><td>{!! $FzRzs->ztext !!}</td><td><center>{{ $FzRzs->fzs->fz_name }}</center></td><td><center>{{ $FzRzs->yeargoszak->title }}</center></td><td><a href="{{ route('admin.home.goszak.edit', ['id' => $FzRzs->id ]) }}" class="btn btn-outline-info btn-sm">Правка</a> <a href="{{ route('admin.home.goszak.delete', ['id' => $FzRzs->id ]) }}" class="btn btn-outline-danger btn-sm">Х</a></td></tr>
															@endforeach
											</table>
											{{ $FzRz->links() }}
										</div>
										<div class="tab-pane fade" id="razmeshchenie-otmeneno" role="tabpanel" aria-labelledby="razmeshchenie-otmeneno-tab"><br />
											<table class="table table-borderless table-sm">
													<tr>
															<th style="width:70%;" scope="col">Наименование</th>
															<th scope="col">Закон</th>
															<th scope="col">Год</th>
															<th scope="col">Управление</th>
													</tr>
															@foreach ($FzRo as $FzRos)
																	<tr><td>{!! $FzRos->ztext !!}</td><td><center>{{ $FzRos->fzs->fz_name }}</center></td><td><center>{{ $FzRos->yeargoszak->title }}</center></td><td><a href="{{ route('admin.home.goszak.edit', ['id' => $FzRos->id ]) }}" class="btn btn-outline-info btn-sm">Правка</a> <a href="{{ route('admin.home.goszak.delete', ['id' => $FzRos->id ]) }}" class="btn btn-outline-danger btn-sm">Х</a></td></tr>
															@endforeach
											</table>
											{{ $FzRo->links() }}
										</div>
                  </div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
