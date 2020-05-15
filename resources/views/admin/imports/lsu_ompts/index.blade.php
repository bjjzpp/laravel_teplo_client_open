@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Работа с загрузкой данных Л/С потребителей МП Теплоснабжение</h2></header>
								<div class="entry-content">
									1) <a href="{{ route('admin.imports.lsu_ompts.closelsumount') }}">Переводим квитанции в архив</a><br />
									2) <a href="{{ route('admin.imports.lsu_ompts.loadcsv') }}">Загрузка списка новых Л/С (csv)</a><br />
									3.1) <a href="{{ route('admin.imports.lsu_ompts.loadxmlmini') }}">Загрузка текущей информации по Л/С обычная (xml)</a><br />
									3.2) <a href="{{ route('admin.imports.lsu_ompts.loadxmlchange') }}">Загрузка текущей информации по Л/С с расшифровкой (xml)</a><br />
									4) <a href="{{ route('admin.imports.lsu_ompts.qrcode') }}">Создание Qr-Code для оплаты через ФК Открытие</a><br /> 
                                <br />
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
