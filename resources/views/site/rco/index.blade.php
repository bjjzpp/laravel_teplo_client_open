@extends('layouts.site')
@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">Прямые договора с РСО: информация для заключения прямых договоров с РСО</h2></header>
                        <div class="entry-content">
                            @if(isset($Page))
                            {!! $Page->slime_text !!}
                            <br><br>
                            {!! $Page->full_text !!}
                            @endif
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
							    <li class="nav-item">
							        <a class="nav-link active" id="rso-tab" data-toggle="tab" href="#rso" role="tab" aria-controls="rso" aria-selected="true">Договоры с РСО</a>
								</li>
								<li class="nav-item">
								    <a class="nav-link" id="up-tab" data-toggle="tab" href="#up" role="tab" aria-controls="up" aria-selected="false">Непосредственное управление</a>
								</li>
							</ul>
								  <div class="tab-content" id="myTabContent">
								    <div class="tab-pane fade active show" id="rso" role="tabpanel" aria-labelledby="rso-tab"><br />
                                        @foreach($Rco as $Rco)
                                            <a href="{{ route('rco.show', ['id' =>$Rco->id ]) }}">{{ $Rco->title }}</a><br>
                                        @endforeach
								    </div>
								    <div class="tab-pane fade" id="up" role="tabpanel" aria-labelledby="up-tab"><br />
                                        @foreach($Rco1 as $Rco)
                                            <a href="{{ route('rco.show', ['id' =>$Rco->id ]) }}">{{ $Rco->title }}</a><br>
                                        @endforeach
                                    </div>
                                </div>
                		</div>
	            <footer class="entry-footer"></footer>
            </article>
		</main>
	</div>
  </div>
 </div>
</div>
@endsection
