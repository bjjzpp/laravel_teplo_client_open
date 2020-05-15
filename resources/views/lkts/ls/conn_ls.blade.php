@extends('layouts.site_bar_lkts')
@section('content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('ls') }}">Назад</a><br /><br />
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Подключение Л/С</h2></header>
								<div class="entry-content">
                                @foreach ($LktsLs as $item)
                                    @if($item->pin_active == 0)
                                        @if($item->ls_user_active == 0)
                                            <div class="col-md-12 border border-info rounded">
                                                ФИО: {{ $item->lastname }} {{ $item->firstname }}
                                                Л/С: {{ $item->ls }} <br />
                                                Адрес: {{ $item->rco_maps->name }}, кв: {{ $item->office }}<br />
                                                <div class="text-danger"><b><u>Активирован</u></b></div><br />
                                                <small>Сделуйте инструкции на странице <a href="/ls"><u>Л/С</u></a></small>
                                            </div><br /><br />
                                        @else
                                            <b>Вы не прошли проверку, Ваши учетные данные отличаются!</b><br />
                                            &nbsp;&nbsp;&nbsp;1) Проверте правильность ввода Вашего Л/С.<br />
                                            &nbsp;&nbsp;&nbsp;2) Возможно вы вошли под новым пользователем, по причине то что забыли пароль от старой учетной записи, воспользуйтесь &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('password.request') }}"><b>сбросом пароля</b></a>.<br />
                                            &nbsp;&nbsp;&nbsp;3) Возможно кто-то из ваших родственников подключил к своему личному кабинету ваш Л/С.<br />
                                            &nbsp;&nbsp;&nbsp;4) ...
                                        @endif
                                    @elseif($item->pin_active == 1)
                                        <div class="col-md-12 border border-info rounded">
                                            ФИО: {{ $item->lastname }} {{ $item->firstname }}
                                            Л/С: {{ $item->ls }} <br />
                                            Адрес: {{ $item->rco_maps->name }}, кв: {{ $item->office }}<br />
                                            <div class="text-danger"><b><u>Активирован</u></b></div>
                                        </div><br /><br />
                                    @endif
                                        <form action="{{ route('ls.conn_ls_add') }}" method="POST">
                                            @csrf
                                            <div class="form-group row mb-0">
                                                <input type="hidden" id="idls" name="idls" value="{{ $item->id }}" />
                                                <input type="hidden" id="id_lkts_users" name="id_lkts_users" value="{{ $uid }}" />
                                                <div class="col-md-6 offset-md-4">
                                                    <button class="btn btn-primary btn-sm">
                                                        Подключить
                                                    </button>
                                                </div>
                                            </div>
                                        </form><br /><br /><br />
                                @endforeach
								</div>
						</article>
			<br /><br /></div><!-- #primary -->
        </main><!-- #main -->
@endsection