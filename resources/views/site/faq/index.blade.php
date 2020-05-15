@extends('layouts.site')
@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    
    <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <header class="entry-header"><h2 class="entry-title">Вопросы и Ответы на обращения граждан в МП Теплоснабжение г.Обнинск</h2></header><br /><br />
         @foreach($PersonFaq as $Faq)
            @if($Faq->status !== 0)
                <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                        <div class="entry-meta">
                            <span class="posted-on">Дата вопроса: <time class="entry-date published">{{ \Carbon\Carbon::parse($Faq->faq_in_date)->format('d.m.Y') }}</time></span>
                            <span class="author vcard">От: {{ $Faq->person }}</span>
                        </div>
                    <div class="entry-content">
                        {!! str_limit($Faq->faq_in_text, 200) !!}
                    </div>
                    <header class="entry-header"><h3 class="entry-title"><a href="{{ route('faq.show', ['id' => $Faq->id ]) }}">Подробно</a></h3></header>
                </article>
            @endif 
        @endforeach   
        {{ $PersonFaq->links() }} 
		</main>
	</div>
</div>
</div>
</div>
@endsection