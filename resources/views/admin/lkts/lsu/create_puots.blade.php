@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.lkts.lsu.edit', ['id' => $pid]) }}">Назад</a><br /><br />
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Адрес: {{ $lkts->rco_maps->name }}, кв. {{ $lkts->office }} / Показания прибора учета</h2></header>
								<div class="entry-content">
                                        <p class="text-center text-danger font-weight-light bg-warning"><strong>Подготовка к отправке!<br />Показаний приборов учета за текущий месяц, по лицевому счету:  @foreach ($ls as $l) {{ $l->ls }} @endforeach !</strong></p>
                                <form name="feedback" method="post" action="{{ route('admin.lkts.lsu.store_puots') }}" class="form-horizontal" >
                                    @csrf
                                    <input type="hidden" name="pid" id="pid" value="{{ $pid }}">
                                    <input type="hidden" name="pdate" id="pdate" value="{{ $pdate }}">
                                    <input type="hidden" name="id_lkts_ls" id="id_lkts_ls" value="{{ $pid }}">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-sm" id="btn_save">
                                                <span aria-hidden="true"> {{ __('Далее') }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </form><br/>
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection