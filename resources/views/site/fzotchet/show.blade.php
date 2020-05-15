@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
          <a href="{{ route('fzotchet') }}">Назад</a><br /><br />
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">{!! $OtchetGoszak->ztext !!}</h2></header>
                        <div class="entry-content">
                            @if(count($OtchetGoszak->otchet_files) > 0)
                                <br><br>
                                <b>Документы закупки</b>
                                <table class="table table-borderless">
                                        <tr>
                                            <th>Наименование</th>
                                            <th>Актуальность документа</th>
                                            <th>Дата</th>
                                        </tr>
                                            @foreach($OtchetGoszak->otchet_files as $fl)
                                                <tr><td>
                                                  {{ ImgFile::getImgFilePath(env('APP_URL'), $fl->fpatch) }}
                                                  &nbsp;<a href="{{ Storage::url($fl->fpatch) }}">Скачать отчет за текущий месяц</a></td>
                                                <td>@if($fl->oldfile > 0) <font color="geen">Действующий</font> @else <font color="red">Недействующий</font> @endif</td>
                                                <td>{{ \Carbon\Carbon::parse($fl->dfiles)->format('d.m.Y') }}</td></tr>
                                            @endforeach
                                    </table>
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
