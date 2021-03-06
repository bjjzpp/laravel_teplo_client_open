@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
          <a href="{{ route('training') }}">Назад</a><br /><br />
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">{{ $trainings->title_page }}</h2></header><br />
                        <div class="entry-content text-center">
                            <video width="791" height="445" controls="controls" tabindex="-1">
                               <source src="{{ Storage::url($trainings->pfiles) }}" />
                            </video>
                		</div><br />
	            <footer class="entry-footer">
		        </footer>
            </article>
		</main>
	</div>
  </div>
 </div>
</div>
@endsection
