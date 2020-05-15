@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">Новости</h2></header>
                        <div class="entry-content">
                            @if(isset($Page))
                            {!! $Page->slime_text !!}
                            <br><br>
                            {!! $Page->full_text !!}
                            @endif

                            @foreach($News as $New)
                                 <a href="{{ route('news.show', ['id' => $New->id ]) }}"><small>{{ \Carbon\Carbon::parse( $New->created_at)->format('d.m.Y') }} - {!! $New->title_news !!}</small></a><br /><br />
                            @endforeach
                        </div>
	            <footer class="entry-footer"></footer>
            </article>
            {{ $News->links() }}
		</main>
	</div>
  </div>
 </div>
</div>      
@endsection