@extends('layouts.site')
@section('content')
    <div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
          <a href="{{ route('fzplan') }}">Назад</a><br /><br />
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">{!! $FzPlan->ztext !!}</h2></header>
                        <div class="entry-content">
                                <br><br>
                                <b>Документы закупки</b>
                                <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#panel1">Действующие</a></li>
                                    <li><a href="#panel2">Недействующие</a></li>
                                  </ul>

                                  <div class="tab-content">
                                    <div id="panel1" class="tab-pane fade in active">
                                        <br />
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>Наименование</th>
                                                <th>Актуальность документа</th>
                                                <th>Дата</th>
                                            </tr>
                                            @foreach($FzPlan->fz_plans as $fp)
                                                @if($fp->oldfile > 0)
                                                    <tr><td><a href="{{ Storage::url($fp->pfiles) }}">{{ $fp->nfiles }}</a></td>
                                                    <td>@if($fp->oldfile > 0) <font color="geen">Действующий</font> @else <font color="red">Недействующий</font> @endif</td>
                                                    <td>{{ \Carbon\Carbon::parse($fp->dfiles)->format('d.m.Y') }}</td></tr>
                                                @endif
                                            @endforeach
                                        </table>
                                    </div>
                                    <div id="panel2" class="tab-pane fade">
                                        <br />
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>Наименование</th>
                                                <th>Актуальность документа</th>
                                                <th>Дата</th>
                                            </tr>
                                            @foreach($FzPlan->fz_plans as $fp)
                                                @if($fp->oldfile == 0)
                                                    <tr><td><a href="{{ Storage::url($fp->pfiles) }}">{{ $fp->nfiles }}</a></td>
                                                    <td>@if($fp->oldfile > 0) <font color="geen">Действующий</font> @else <font color="red">Недействующий</font> @endif</td>
                                                    <td>{{ \Carbon\Carbon::parse($fp->dfiles)->format('d.m.Y') }}</td></tr>
                                                @endif
                                            @endforeach
                                        </table>
                                    </div>
                                  </div>
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
@section('script')
<script>
$(function(){
  $("#myTab a").click(function(e){
    e.preventDefault();
    $(this).tab('show');
  });
});
</script>
@endsection
