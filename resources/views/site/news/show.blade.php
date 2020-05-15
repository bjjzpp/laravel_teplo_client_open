@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
          <a href="{{ route('news') }}">Назад</a><br /><br />
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">{!! $News->title_news !!}</h2></header>
                        <div class="entry-content">
                             {!! $News->body_news !!}
                                <br><br>
                                @if(count($News->news_files) > 0)
                                    <b>Файлы</b><br>
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Наименование</th>
                                            <th>Дата</th>
                                        </tr>
                                            @foreach($News->news_files as $af)
                                                <tr><td>
                                                    {{ ImgFile::getImgFilePath(env('APP_URL'), $af->pfiles) }}
                                                    &nbsp;<a href="{{ Storage::url($af->pfiles) }}">{{ $af->nfiles }}</a></td><td>{{ \Carbon\Carbon::parse($af->dfiles)->format('d.m.Y') }}</td></tr>
                                            @endforeach
                                    </table>
                                @endif
                		</div>
	            <footer class="entry-footer">
                    <small>{{ \Carbon\Carbon::parse( $News->created_at)->format('d.m.Y') }}</small>
		        </footer>
            </article>
		</main>
	</div>
  </div>
 </div>
</div>
@endsection
