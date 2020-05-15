@extends('layouts.site_bar_lkts')
@section('content')
	<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('edo') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Новое Заявление на подключение</h2></header>
								<div class="entry-content">
                                    <center>Заполните «Заявку на подключение к системе теплоснабжения», подпишите и отсканируйте, так же приложите отсканированные копии
                                            из документа «Перечень документов, не обходимых для подготовки на подключение».<br>
                                            Файлы загружайте не более 10Мб.<br>
                                            Форматы файлов: jpg, png, pdf, docx, doc</center>
                                            <br />
                                            <b>Документы, Бланки</b><br />
                                            <a href="http://teplo.obninsk.ru/files/pconn_consumers_2_03.10.2017_Forma_zaiavki_na_podkliuchenie_k_sisteme_teplosnabzheniia.doc">Заявку на подключение к системе теплоснабжения</a><br />
                                            <a href="http://teplo.obninsk.ru/files/pconn_consumers_2_24.04.2017_Perechen___dokumentov.docx">Перечень документов, необходимых для подготовки на подключение</a><br />
                                            <a href="http://teplo.obninsk.ru/files/pconn_consumers_2_03.10.2017_Obrazec_zaiavki_na_podkliuchenie_k_sisteme_teplosnabzheniia-Fiz.lico.doc">Образец форма заявки на подключение (для физ.лиц)</a><br />
                                            <a href="http://teplo.obninsk.ru/files/pconn_consumers_2_03.10.2017_Obrazec_zaiavki_na_podkliuchenie_k_sisteme_teplosnabzheniia-IUr.lico.doc">Образец форма заявки на подключение (для юр.лиц)</a><br /><br /><br />
                                            <form action="{{ route('edo.store') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="edo_name_object">Назание подключаемого объекта</label><br>
                                                <input type="text" name="edo_name_object" class="form-control" size="110" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success pull-right btn-sm">
                                                    Сохранить
                                                </button>
                                            </div>
                                            </form><br /><br />
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
