@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">Способы оплаты</h2></header>
                        <div class="entry-content">
                            @if(isset($Page))
                            {!! $Page->slime_text !!}
                            <br><br>
                            {!! $Page->full_text !!}
                            @endif
                            <div class="entry-content">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#pay-sber" role="tab" aria-controls="pay-sber" aria-selected="true">Сбербанк</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#pay-open" role="tab" aria-controls="pay-open" aria-selected="false">Октрытие</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#pay-gis" role="tab" aria-controls="pay-gis" aria-selected="false">ГИС ЖКХ</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="pay-sber" role="tabpanel" aria-labelledby="pay-sber"><br />
                                    @foreach ($Pay as $item)
                                        @if ($item->id_spr_bank == 1 and $item->default == 0)
                                          <a href="{{ route('pay.show', ['id' => $item->id]) }}">{{ $item->title }}</a><br />
                                        @endif
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="pay-open" role="tabpanel" aria-labelledby="pay-open"><br />
                                    @foreach ($Pay as $item)
                                        @if ($item->id_spr_bank == 2 and $item->default == 0)
                                            <a href="{{ route('pay.show', ['id' => $item->id]) }}">{{ $item->title }}</a><br />
                                        @endif
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="pay-gis" role="tabpanel" aria-labelledby="pay-gis"><br />
                                    @foreach ($Pay as $item)
                                        @if ($item->id_spr_bank == 3 and $item->default == 0)
                                            <a href="{{ route('pay.show', ['id' => $item->id]) }}">{{ $item->title }}</a><br />
                                        @endif
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