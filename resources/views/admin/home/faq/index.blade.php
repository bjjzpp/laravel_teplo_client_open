@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
    <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <a href="{{ route('lkts') }}">Назад</a><br /><br />
        <header class="entry-header"><h2 class="entry-title">Вопросы и Ответы на обращения граждан в МП Теплоснабжение г.Обнинск</h2></header><br /><br />
         @foreach($PersonFaq as $Faq)
               <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
			    	<div class="entry-meta">
			            <span class="posted-on">Дата вопроса: <time class="entry-date published">{{ \Carbon\Carbon::parse($Faq->faq_in_date)->format('d.m.Y') }}</time></span>
                        <span class="author vcard">От: {{ $Faq->person }}</span>
                        <span>@if($Faq->faq_out_text != null) <font color='red'><u>Ответ предоставлен</u></font> @endif</span>
                    </div>
                <div class="entry-content">
                    {!! str_limit($Faq->faq_in_text, 200) !!}
                </div><br />
                 <header class="entry-header"><h3 class="entry-title"><a href="{{ route('admin.home.faq.edit', ['id' => $Faq->id ]) }}">Ответить</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('admin.home.faq.delete', ['id' => $Faq->id ]) }}">Х</a></h3></header>
            </article>
        @endforeach
        {{ $PersonFaq->links() }}
		</main>
	</div>
@endsection
