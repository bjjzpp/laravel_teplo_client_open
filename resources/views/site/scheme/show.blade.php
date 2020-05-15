@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
          <a href="{{ route('scheme') }}">Назад</a><br /><br />
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">{{ $Tchema->name_chema }}</h2></header>
                        <div class="entry-content">
                            @if(isset($Tchema->tchema_files))
                                <b>Файлы</b><br>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Наименование</th>
                                        <th>Дата</th>
                                    </tr>
                                        @foreach($Tchema->tchema_files as $af)
                                            <tr><td>
                                            {{ ImgFile::getImgFilePath(env('APP_URL'), $af->fpatch) }}
                                            &nbsp;  <a href="{{ Storage::url($af->fpatch) }}">{{ $af->fname }}</a></td><td>{{ \Carbon\Carbon::parse($af->fdata)->format('d.m.Y') }}</td></tr>
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
