@extends('layouts.site')
@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
          <a href="{{ route('goszak') }}">Назад</a><br /><br />
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">Общие сведения о Госзакупке №{{ $Goszak->numzak }}</h2></header>
                        <div class="entry-content">
                            Госзакупки(закон): {{ $Goszak->fzs->fz_name }}<br>
                            Номер извещения: {{ $Goszak->numzak }}<br>
                            Госзакупка в электронной форме: @if(isset($Goszak->etorg_id) && intval($Goszak->etorg_id) > 1) <a href="{{$Goszak->spr_etorgs->etorg_link}}{{ $Goszak->etorg_num }}">{{ $Goszak->etorg_num }}</a> площадка: {{$Goszak->spr_etorgs->etorg_name}}     @else Нет @endif<br>
                            Наименование закупки: {!! $Goszak->ztext !!}<br>
                            Способ размещения закупки: {{ $Goszak->typegoszaks->typename }} <br>
                            Этап закупки: {{ $Goszak->goszak_types->title }}<br>
                            Период размещения: c {{ \Carbon\Carbon::parse($Goszak->databegin)->format('d.m.Y') }} по {{ \Carbon\Carbon::parse($Goszak->dataend)->format('d.m.Y') }}<br>

                            @if(count($Goszak->fz223_files) > 0)
                                <br><br>
                                <b>Документы закупки</b>
                                <table class="table table-borderless">
                                        <tr>
                                            <th>Наименование</th>
                                            <th>Актуальность документа</th>
                                            <th>Дата</th>
                                        </tr>
                                            @foreach($Goszak->fz223_files as $fl)
                                                <tr><td>
                                                        {{ ImgFile::getImgFilePath(env('APP_URL'), $fl->pfiles) }}
                                                        &nbsp;<a href="{{ Storage::url($fl->pfiles) }}">{{ $fl->nfiles }}</a></td>
                                                <td>@if($fl->oldfile > 0) <font color="geen">Действующий</font> @else <font color="red">Недействующий</font> @endif</td>
                                                <td>{{ \Carbon\Carbon::parse($fl->dfiles)->format('d.m.Y') }}</td></tr>
                                            @endforeach
                                    </table>
                            @endif

                            @if(count($Goszak->fz223_contracts) > 0)
                            <br><br>
                            <b>Реестр договоров</b>
                            <table class="table table-borderless">
                                    <tr>
                                        <th>Наименование</th>
                                        <th>Номер договора</th>
                                        <th>Действие</th>
                                    </tr>
                                        @foreach($Goszak->fz223_contracts as $fc)
                                            <tr><td>{{ $fc->lot }}</td>
                                            <td>{{ $fc->link_lot }}</td>
                                            <td><a href="{{ $Goszak->fzs->url_fz_doc.$fc->link_lot }}">Просмотр</a></td></tr>
                                        @endforeach
                                </table>
                            @else

                            @endif
                		</div>

	            <footer class="entry-footer">
		        </footer>
            </article>
		</main>
	</div>
  </div>
 </div>
</div>
@endsection
