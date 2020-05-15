@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
          <a href="{{ route('standart') }}">Назад</a><br /><br />
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">{{ $StandartBf->standart_type->title }}</h2></header>
                        <div class="entry-content">
                            {!! $StandartBf->ztext !!}
                            @if(isset($StandartBf->standart_bf_files))
                                @if(count($StandartBf->standart_bf_files) > 0)
                                <br><br><b>Файлы</b><br>
                                <table class="table table-borderless">
                                        <tr>
                                            <th>Наименование</th>
                                            <th>Дата</th>
                                        </tr>
                                            @foreach($StandartBf->standart_bf_files as $sbf)
                                                <tr><td>
                                                {{ ImgFile::getImgFilePath(env('APP_URL'), $sbf->pfiles) }}
                                                &nbsp;  <a href="{{ Storage::url($sbf->pfiles) }}">{{ $sbf->nfiles }}</a></td><td>{{ \Carbon\Carbon::parse($sbf->dfiles)->format('d.m.Y') }}</td></tr>
                                            @endforeach
                                    </table>
                                @endif
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
