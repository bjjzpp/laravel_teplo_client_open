@extends('layouts.site_bar_lkts')
@section('content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                            <a href="{{ route('ls.edit', ['id' => $lkts_ls_puot->id_lkts_ls]) }}">Назад</a><br /><br />
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
                                <p class="text-center text-danger font-weight-light bg-warning"><strong>Внимание!<br />Перед за полнением данных и отправкой данных, проверьте правильность заполнения данных по показаниям прибора учета!</strong></p>
                                <header class="entry-header"><h2 class="entry-title">{{ $lkts_ls_puot->title }}</h2></header>
                                    <div class="entry-content">
                                    @if($lkts_ls_puot->flag_write == 0)
                                    <form name="feedback" method="post" action="{{ route('ls.send_puots') }}" class="form-horizontal">
                                    @csrf
                                    @endif
                                    <input type="hidden" name="lkts_ls_puots_id" id="lkts_ls_puots_id" value="{{ $id }}">
                                    @foreach ($lkts_ls_u as $item)
                                        <input type="hidden" name="ls" id="ls" value="{{ $item->ls }}">
                                        <input type="hidden" name="fio" id="fio" value="{{ $item->fio }}">
                                        <input type="hidden" name="street" id="street" value="{{ $item->street }}">
                                        <input type="hidden" name="office" id="office" value="{{ $item->office }}">
                                        <input type="hidden" name="email" id="email" value="{{ $item->email }}">
                                    @endforeach
                                    <div class="text-right">@if($lkts_ls_puot->flag_write == 0)<a href="{{ route('ls.edit_puots_addp', ['id' => $id ]) }}" class="pull-right btn btn-outline-dark btn-sm">Добавить показания</a>@endif</div><br />
                                        <table class="table thead-light table-sm">
                                            <tr>
                                                <th scope="col" style="width:61%;">Наименование ПУ</th>
                                                <th scope="col">Показания</th>
                                            </tr>
                                            @if(isset($lkts_ls_pu_ot_datas))
                                                @foreach($lkts_ls_pu_ot_datas as $pu_ot_datas)
                                                    <tr>
                                                        <td>{{ $pu_ot_datas->namepu }} ({{ $pu_ot_datas->numberpu }})</td>
                                                        <td>{{ $pu_ot_datas->pu_data }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </table>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                @if(isset($lkts_ls_pu_ot_datas) && count($lkts_ls_pu_ot_datas) > 0)
                                                    @if($lkts_ls_puot->flag_write == 0)
                                                        <button type="submit" class="btn btn-primary btn-sm" id="btn_save">
                                                            <span aria-hidden="true"> {{ __('Отправить') }}</span>
                                                        </button>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </form><br/>
                                    </div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
