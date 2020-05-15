@extends('layouts.site_bar_lkts')
@section('content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                    <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Профиль пользователя</h2></header>
								<div class="entry-content">
                                <form action="{{ route('profile.update', ['id' => $Lkts->id]) }}" method="post">
                                    {{ csrf_field() }}
                                <table class="table table-borderless">
                                        <tr><td>Адрес:</td><td><textarea id="address" name="address" rows="7" cols="58" class="ckeditor form-control">{{ $Lkts->address }}</textarea></td></tr>
                                        <tr><td>Телефон:</td><td><input id="phone" name="phone" type="text" maxlength="255" size="60" value="{{ $Lkts->phone}}" class="form-control"/></td></tr>
                                </table>

                                <div class="form-group">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        Сохранить
                                    </button>
                                </div>
                                </form><br /><br />
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                    <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Профиль пользователя</h2></header>
								<div class="entry-content">
                                <form action="{{ route('profile.update', ['id' => $Lkts->id]) }}" method="post">
                                    {{ csrf_field() }}
                                <table class="table table-borderless">
                                        <tr><td>Адрес:</td><td><textarea id="address" name="address" rows="7" cols="58" class="ckeditor form-control">{{ $Lkts->address }}</textarea></td></tr>
                                        <tr><td>Телефон:</td><td><input id="phone" name="phone" type="text" maxlength="255" size="60" value="{{ $Lkts->phone}}" class="form-control"/></td></tr>
                                </table>

                                <div class="form-group">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        Сохранить
                                    </button>
                                </div>
                                </form><br /><br />
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
