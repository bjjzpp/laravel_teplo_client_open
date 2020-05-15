@extends('layouts.site_bar_lkts')
@section('content')
	<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Сообщение</h2></header>
								<div class="entry-content">
                                        <div class="text-right"><a href="{{ route('pm.create') }}" class="btn btn-outline-dark btn-sm">Новое сообщение</a></div><br>
                                    <table class="table thead-light table-sm">
                                        <tr>
                                            <th scope="col"><center>Дата</center></th>
                                            <th scope="col" style="width:60%;">Наименование</th>
                                            <th scope="col">Статус</th>
                                        </tr>
                                            @foreach ($LktsPm as $gz)
                                                <tr><td>{{ \Carbon\Carbon::parse($gz->pm_date_in)->format('d.m.Y') }}</td>
                                                <td><a href="{{ route('pm.show', ['id' => $gz->id]) }}">{!! $gz->pm_in !!}</a></td>
                                                <td>@if($gz->status == 0) Обработка @else Выполнено @endif</td></tr>
                                            @endforeach
                                    </table>
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
