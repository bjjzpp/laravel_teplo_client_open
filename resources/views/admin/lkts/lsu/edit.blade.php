@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.lkts.lsu.show', ['id' => $LktsLs->id_maps]) }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
                        <header class="entry-header"><h2 class="entry-title">Адрес: {{ $LktsLs->rco_maps->name }}, кв. {{ $LktsLs->office }}</h2></header>
                        <b>Карточка абонента</b>
                        <table class="table-sm">
                            <tbody>
                                <tr>
                                    <td>ФИО</td>
                                    <td>{{ $LktsLs->lastname }} {{ $LktsLs->firstname }} {{ $LktsLs->middlename }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $User->email }}</td>
                                </tr>
                                <tr>
                                    <td>Телефон</td>
                                    <td>{{ $User->mobile }}</td>
                                </tr>
                                <tr>
                                    <td>Количество проживающих</td>
                                    <td>{{ $LktsLs->coun_people }}</td>
                                </tr>
                                <tr>
                                    <td>Жилая площадь</td>
                                    <td>{{ $LktsLs->houseroom }}</td>
                                </tr>
                                <tr>
                                    <td>Л/С</td>
                                    <td>
                                    {{ $LktsLs->ls }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Л/С статус</td>
                                    <td>
                                        @if($LktsLs->pin_active == 0)
                                            <span class="font-weight-bold text-danger">Не активирован</span>
                                        @else
                                            <span class="font-weight-bold text-success">Активирован</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Пин-код</td>
                                    <td>
                                        {{ $LktsLs->pin }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @foreach ($LktsLsCharge as $item)
                            @if($item->flag_write == 0)
                            <b>Начислено</b>
                                <table class="table-sm">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">{{ $item->title }}</td>
                                        </tr>
                                        <tr>
                                            <td>За должность за предыдущий период</td>
                                            <td>{{ number_format($item->debt, 2, ',', '') }} (руб.)</td>
                                        </tr>
                                        <tr>
                                            <td>Аванс на начало периода</td>
                                            <td>{{ number_format($item->advance_pay_begin, 2, ',', '') }} (руб.)</td>
                                        </tr>
                                        <tr>
                                            <td>Оплачено</td>
                                            <td>{{ number_format($item->pay, 2, ',', '') }} (руб.)</td>
                                        </tr>
                                        <tr>
                                            <td>Сумма к оплате</td>
                                            <td>{{ number_format($item->charge, 2, ',', '') }} (руб.)</td>
                                        </tr>
                                        @if($LktsLs->ticket_ver == 0)
                                            <tr>
                                                <td>Квитанция</td>
                                                <td><a href="{{ Storage::url('lsu/'.$LktsLs->ls.'.pdf') }}" target="_blank">Скачать</a></td>
                                            </tr>
                                            <tr>
                                                <td>Оплата по QR-Code<br /> через приложение<br /> Сбербанк.</td>
                                                <td><img src="{{ asset('qr_code/'.$LktsLs->ls.'.png') }}" width="170px" height="170px" alt="Оплата по QR-Code через приложение Сбербанк.">
                                                    <br />Оплатить до 25 числа<br /> следующего месяца</td>
                                            </tr>
                                        @elseif($LktsLs->ticket_ver == 1)
                                            <tr>
                                                <td>Квитанция</td>
                                                <td><a href="{{ route('admin.lkts.lsu.webprint', ['id' => $item->id ]) }}" target="_blank" class="btn btn-warning btn-sm">Скачать</a></td>
                                            </tr>
                                            <tr>
                                                <td>Оплата по QR-Code<br /> через приложение<br /> Сбербанк или ФК Открытие.</td>
                                                <td><img src="{{ asset('qr_code_open/'.$LktsLs->ls.'.png') }}" width="170px" height="170px" alt="Оплата по QR-Code через приложение Сбербанк.">
                                                    <br />Оплатить до 25 числа<br /> следуещего месяца</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            @endif
                        @endforeach    
                        <br />        
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pu-tab" data-toggle="tab" href="#pu" role="tab" aria-controls="pu" aria-selected="true">Приборы учета</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pu_invose-tab" data-toggle="tab" href="#pu_invose" role="tab" aria-controls="pu_invose" aria-selected="false">Показания ПУ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="checklist-tab" data-toggle="tab" href="#checklist" role="tab" aria-controls="checklist" aria-selected="false">Взаиморасчеты</a>
                            </li>
                            {{--<li class="nav-item">
                                <a class="nav-link" id="banklist-tab" data-toggle="tab" href="#banklist" role="tab" aria-controls="banklist" aria-selected="false">Оплата</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="dog-tab" data-toggle="tab" href="#dog" role="tab" aria-controls="dog" aria-selected="false">Договора</a>
                            </li>--}}
                        </ul>
                        <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="pu" role="tabpanel" aria-labelledby="pu-tab"><br />
                                <div class="text-right"><a href="{{ route('admin.lkts.lsu.createpu', ['id' => $LktsLs->id]) }}" class="pull-right btn btn-outline-success btn-sm">Добавить ПУ</a></div><br />
                                        <table class="table thead-light table-sm">
                                            <tr>
                                                <th scope="col" style="width:48%;">Наименование</th>
                                                <th scope="col">Номер</th>
                                                <th scope="col">Дата следующей<br /> поверки</th>
                                                <th scope="col">Управление</th>
                                            </tr>
                                                @foreach($LktsLs->lkts_ls_pus as $pu)
                                                <tr>
                                                    <td>{{ $pu->namepu }}</td>
                                                    <td>{{ $pu->numberpu }}</td>
                                                    <td><p class="text-center text-danger font-weight-light bg-warning">
                                                            <strong>
                                                                {{ \Carbon\Carbon::parse($pu->dizg)->format('d.m.Y') }}
                                                            </strong>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.lkts.lsu.edit_pu', ['id' => $pu->id]) }}" class="btn btn-outline-info btn-sm">Просмотр</a>
                                                        &nbsp;<a href="#" class="btn btn-outline-danger btn-sm">Х</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="pu_invose" role="tabpanel" aria-labelledby="pu_invose-tab"><br />
                                        <div class="text-right"><a id="add_btn" href="{{ route('admin.lkts.lsu.create_puots', ['id' => $LktsLs->id]) }}" class="pull-right btn btn-outline-success btn-sm" tabindex="-1">Добавить показания ПУ</a></div><br />
                                        <table class="table thead-light table-sm">
                                            <tr>
                                                <th scope="col">Номер</th>
                                                <th scope="col" style="width:55%;">Отчетный период</th>
                                                <th scope="col">Статус</th>
                                                <th scope="col">Управление</th>
                                            </tr>
                                            @foreach($LktsLsPuot as $puots)
                                            <tr>
                                                <td>{{ $puots->id }}</td>
                                                <td>{{ $puots->title }}</td>
                                                <td>
                                                    @if($puots->flag_write == 0)
                                                        <span class="text-danger font-weight-bold">Черновик</span>
                                                    @else
                                                        <span class="text-success font-weight-bold">Отправлено</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.lkts.lsu.edit_puots', ['id' => $puots->id ]) }}" class="btn btn-outline-info btn-sm">Просмотр</a>
                                                        <br />
                                                    <a href="#" class="btn btn-outline-danger btn-sm">Корзина</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="checklist" role="tabpanel" aria-labelledby="checklist-tab"><br />
                                        <table class="table thead-light table-sm">
                                            <tr>
                                                <th scope="col" style="width:48%;">Наименование</th>
                                                <th scope="col">За должность<br /> за предыдущий <br />период</th>
                                                <th scope="col">Аванс<br /> на начало <br />периода</th>
                                                <th scope="col">Оплачено</th>
                                                <th scope="col">Сумма к оплате<br /> за расчетный <br />период</th>
                                            </tr>
                                            @if($LktsLsCharge->count() > 0)
                                                @foreach ($LktsLsCharge as $Charge)
                                                    @if($Charge->flag_write == 1)
                                                        <tr>
                                                            <td>{{ $Charge->title }}</td>
                                                            <td>{{ number_format($Charge->debt, 2, ',', '') }} (руб.)</td>
                                                            <td>{{ number_format($Charge->advance_pay_begin, 2, ',', '') }} (руб.)</td>
                                                            <td>{{ number_format($Charge->pay, 2, ',', '') }} (руб.)</td>
                                                            <td>{{ number_format($Charge->charge, 2, ',', '') }} (руб.)</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </table>//
                                    </div>
                                    {{--<div class="tab-pane fade" id="banklist" role="tabpanel" aria-labelledby="banklist-tab"><br />
                                        <table class="table thead-light table-sm">
                                            <tr>
                                                <th scope="col">Номер</th>
                                                <th scope="col">Действие</th>
                                                <th scope="col">Управление</th>
                                            </tr>
                                        </table>
                                    </div>--}}
                        </div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection