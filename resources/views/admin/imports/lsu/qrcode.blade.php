@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.imports.lsu') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Создание Qr-Code для оплаты через Сбербанк</h2></header>
							    <div class="entry-content">
                                        <p>На текущей страницы выполняется генерация QR-Code для автоматической оплаты по 
                                        средствам приложения Сбербанк на телефонах, платшетах. Под управление следующих операционных 
                                        систем: <b><u>Android</u></b>, <b><u>iOS</u></b>, <b><u>Windows</u></b>.<br /><br /> 
                                        1) Для оплаты по QR-Code важно чтобы на устройстве была камера.<br /> 
                                        2) Созданный QR-Code автоматически подгружается в Личный кабенет абонента. </p><br /><br />
                                        <a href="{{ route('lkts') }}" class="btn btn-lg btn-success">Переход в Админ-Центр</a><br /><br /><br />
                                    @php
                                        $location = 'qr_code/';   
                                        foreach ($qr_code as $value) {
                                            foreach ($Sb as $iten) {
                                                QRCode::text(
                                                    'ST00012|Name='.$Ss->title.
                                                    '|PersonalAcc='.$iten->psh.
                                                    '|BankName='.$iten->bank.
                                                    '|BIC='.$iten->bik.
                                                    '|CorrespAcc='.$iten->ksh.
                                                    '|Sum='.str_replace(".", "", $value->charge).
                                                    '|Purpose=Оплата ЖКУ|PayeeINN='.$Ss->titleinn.
                                                    '|KPP='.$Ss->titlekpp.
                                                    '|lastName='.$value->lastname.
                                                    '|firstName='.$value->firstname.
                                                    '|middleName='.$value->middlename.
                                                    '|payerAddress=Калужская обл, г.Обнинск, '.$value->street.', кв.'.$value->office.
                                                    '|persAcc='.$value->ls.
                                                    '|paymPeriod='.$value->payPeriod.
                                                    '|addAmount=000|TechCode=02'
                                                )
                                                    ->setSize(7)
                                                    ->setMargin(7)
                                                    ->setOutfile($location.$value->ls.'.png')
                                                    ->png();
                                            }
                                        }
                                    @endphp
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection