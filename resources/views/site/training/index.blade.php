@extends('layouts.site')
@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">Видео-инструкция по работе с ЛК Теплоснабжение г.Обнинск</h2></header>
                        <div class="entry-content">
                            @foreach($trainings as $training)
                                <a href="{{ route('training.show', ['id' => $training->id ]) }}">{{ $training->title_page}}</a><br>
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
