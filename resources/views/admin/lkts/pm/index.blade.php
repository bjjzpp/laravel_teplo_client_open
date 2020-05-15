@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">ЛК Сообщения</h2></header>
								<div class="entry-content">
                                        <table class="table table-borderless table-sm">
                                            <tr>
                                                <th scope="col">Дата</th>
                                                <th scope="col">Пользователь</th>
                                                <th scope="col">Сообщение</th>
                                                <th scope="col">Статус</th>
                                                <th scope="col">Управление</th>
                                            </tr>
                                                @foreach ($LktsPm as $Rcos)
                                                    <tr><td>{{ \Carbon\Carbon::parse($Rcos->pm_date_in)->format('d.m.Y') }}</td>
                                                    <td>{{ $Rcos->user->name }}</td>
                                                    <td>{!! str_limit($Rcos->pm_in, 200) !!}</td>
                                                    <td>@if($Rcos->status > 0) <font color="green">Исполнено<br /> {{ \Carbon\Carbon::parse($Rcos->pm_date_out)->format('d.m.Y') }}</font> @else <font color="red">Новое</font> @endif</td>
                                                    <td>
                                                        <a href="{{ route('admin.lkts.pm.edit', ['id' => $Rcos->id ]) }}" class="btn btn-outline-info btn-sm">
                                                          Правка
                                                        </a>
                                                        <a href="{{ route('admin.lkts.pm.delete', ['id' => $Rcos->id ]) }}" class="btn btn-outline-danger btn-sm">
                                                          Х
                                                    </td></tr>
                                                @endforeach
                                        </table>
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
