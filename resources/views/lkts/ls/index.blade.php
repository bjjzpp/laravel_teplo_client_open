@extends('layouts.site_bar_lkts')
@section('content')
	<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Лицевые счета</h2></header>
								<div class="entry-content">
										 <div class="text-right"><a href="{{ route('ls.create') }}" class="pull-right btn btn-outline-dark btn-sm">Добавить Л/С</a></div><br />
											<table class="table thead-light table-sm">
												<tr>
													<th scope="col" style="width:55%;">Л/С</th>
													<th scope="col" style="width:55%;">Улица</th>
													<th scope="col">Кв</th>
													<th scope="col">Управление</th>
												</tr>
												@foreach($LktsLs as $Lsu)
														<tr>
															<td>{{ $Lsu->ls }}</td>
															<td>{{ $Lsu->rco_maps->name }}</td>
															<td>{{ $Lsu->office }}</td>
															<td>
																@if($Lsu->ls_user_active == 1)
																	<a href="{{ route('ls.edit', ['id' => $Lsu->id]) }}" class="btn btn-outline-info btn-sm">Просмотр</a>
																	&nbsp;
																	<a href="{{ route('ls.delete_ls', ['id' => $Lsu->id]) }}" class="btn btn-outline-danger btn-sm">Х</a>
																@elseif($Lsu->ls_user_active == 0)	
																	<form action="{{ route('ls.store_pin_ls') }}" method="POST">
																		@csrf
																		<input type="hidden" id="ulsid" name="ulsid" value="{{ $Lsu->id }}" />
																		Пин-код: <input class="form-control {{ $errors->has('upin') ? ' is-invalid' : '' }}" type="text" name="upin" id="upin" autocomplete="off"/>
																		@if ($errors->has('upin'))
																			<span class="invalid-feedback" role="alert">
																				<strong>{{ $errors->first('upin') }}</strong>
																			</span>
																		@endif
																		<button class="pull-right btn btn-warning btn-sm" style="margin: 7px">
																			Активировать
																		</button>
																	</form>
																	<a href="{{ route('ls.sendpin', ['id' => $Lsu->id]) }}" class="btn btn-success btn-sm">Получить пин-код</a>
																@endif
															</td>
														</tr>	
											 	@endforeach
											</table>
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection