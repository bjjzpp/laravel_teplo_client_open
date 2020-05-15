@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Работа с загрузкой данных Л/С потребителей ЖКУ</h2></header>
								<div class="entry-content">
                                   1) <a href="{{ route('admin.imports.lsu.closelsumount') }}">Переводим квитанции в архив</a><br />
                                   2) <a href="{{ route('admin.imports.lsu.loadpdf') }}">Загрузка квитанций в формате (pdf)</a><br />
								   3) <a href="{{ route('admin.imports.lsu.loadcsv') }}">Загрузка текущей информации по Л/С (csv)</a><br />
								   4) <a href="{{ route('admin.imports.lsu.qrcode') }}">Создание Qr-Code для оплаты через Сбербанк</a><br /> 
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
