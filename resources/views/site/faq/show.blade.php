@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
    <div id="primary" class="content-area">
      <a href="{{ route('faq') }}">Назад</a><br /><br />
		<main id="main" class="site-main" role="main">
            <div class="text-right"><a href="{{ route('faq.webprint', ['id' => $PersonFaq->id ]) }}" class="pull-right btn btn-warning btn-sm" title="Печать" target="_blank">Печать</a></div><br />
	        <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
			    	<div class="entry-meta">
			            <span class="posted-on">Дата вопроса: <time class="entry-date published">{{ \Carbon\Carbon::parse($PersonFaq->faq_in_date)->format('d.m.Y') }}</time>
                        Дата ответа: <time class="updated">{{ \Carbon\Carbon::parse($PersonFaq->faq_out_date)->format('d.m.Y') }}</time></span>
                        <span class="author vcard">От: {{ $PersonFaq->person }}</span>
                    </div>
                    <header class="entry-header"><i>{!! $PersonFaq->faq_in_text !!}</i></header><br />
                <div class="entry-content">
                    {!! $PersonFaq->faq_out_text !!}<br /><br />
                    @if(!empty($PersonFaq->faq_out_files))
                    {{ ImgFile::getImgFilePath(env('APP_URL'), $PersonFaq->faq_out_files) }}
                      &nbsp;<a href="{{ Storage::url($PersonFaq->faq_out_files) }}">Скан-копия ответа {{ $PersonFaq->faq_out_files }}</a>
                    @endif
                </div>
                <footer class="entry-footer">
                    <br /><span class="cat-links">{{ $PersonFaq->faq_out_ts }}</span>
                </footer>
            </article>
		</main>
	</div>
</div>
</div>
</div>
@endsection
