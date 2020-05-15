@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">Подключение потребителей: информация для подключения потребителей</h2></header>
                        <div class="entry-content">
                            @if(isset($Page))
                            {!! $Page->slime_text !!}
                            <br><br>
                            {!! $Page->full_text !!}
                            @endif

                            @foreach($ConnConsumer as $ConnConsumers)
                                <a href="{{ route('conn_consumers.show', ['id' =>$ConnConsumers->id ]) }}">{{ $ConnConsumers->title }}</a><br>
                            @endforeach
                        </div>
	            <footer class="entry-footer"></footer>
            </article>
		</main>
	</div>
  </div>
 </div>
</div>          
@endsection