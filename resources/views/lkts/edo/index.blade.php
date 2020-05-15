@extends('layouts.site_bar_lkts')
@section('content')
<div id="featured-content">
	<div class="container">
		<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
                    <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Электронные заявления</h2></header>
								<div class="entry-content">
                                        <div class="text-right"><a href="{{ route('edo.create') }}" class="btn btn-outline-dark btn-sm">Новая заявка</a></div><br>
                                    @if(isset($LktsEdo))
                                        <table class="table thead-light table-sm">
                                                    <tr>
                                                        <th scope="col"><center>Дата заявки</center></th>
                                                        <th scope="col">Объект подключения</th>
                                                        <th scope="col">Мониториг заявки</th>
                                                        <th scope="col">Статус ЭДО</th>
                                                    </tr>
                                                        @foreach ($LktsEdo as $gz)
                                                            <tr><td>{{ \Carbon\Carbon::parse($gz->edo_date_in)->format('d.m.Y') }}</td>
                                                            <td><a href="{{ route('edo.edit', ['id' =>$gz->id ]) }}">{{$gz->edo_name_object}}</a></td>
                                                            <td>@if($gz->edo_frm == null) <b><u>Заявка не отправлена</u></b> @else <a href="{{ route('edo.log', ['lkts_edo_id' => $gz->id ]) }}">Подробнее</a> @endif</td>
                                                            <td>@if($gz->edo_frm == null and $gz->edo_out_close == null) Черновик @elseif($gz->edo_frm != null and $gz->edo_out_close == null) Обработка @else <b>ЭДО завершен</b> @endif</td></tr>
                                                        @endforeach
                                                </table>
                                        @else
                                            <i>Сообщений нет.</i>
                                        @endif
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
