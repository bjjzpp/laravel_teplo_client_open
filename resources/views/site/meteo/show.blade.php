@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
          <a href="{{ route('meteo') }}">Назад</a><br /><br />
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">Метео-данные: данные за период с {{ \Carbon\Carbon::parse($datas)->format('d.m.Y') }} по {{ \Carbon\Carbon::parse($datap)->format('d.m.Y') }}</h2></header>
                        <div class="entry-content">
                            @if(isset($Meteoarh))
            <?php $num = 0;  $tem_count = 0;?>
                <div>
                    <table class="table table-borderless">
                        <tr>
                            <th>№</th>
                            <th>Дата</th>
                            <th>Температура</th>
                            <th>Отопительный сезон</th>
                        </tr>
                            @foreach($Meteoarh as $m)
                            <?php $num = $num + 1; $tem_count = $tem_count + $m->tem ?>
                                <tr><td>{{ $num }}</td><td>{{ \Carbon\Carbon::parse($m->data_m)->format('d.m.Y') }}</td><td>{{ $m->tem }}</td><td>@if($m->flag > 0) <img src="{{ asset('images/meteo_ok.png')}}" border="0" width="16px" height="16px"> @else @endif</td></tr>
                            @endforeach
                    </table><br>
                    
                </div>
            </div>
            <footer class="entry-footer">
                В текущем месяце <b><u>{{$TemCount}}</u></b> дней, указывайте правильный период, пример 01.01.2014 – 31.01.2014.</br>
                *Среднесуточная температура за месяц: {{sprintf("%.2f", $tem_count/$TemCount) }}.
		    </footer>
            @else
                <footer class="entry-footer">
                    Нет данных!
		        </footer>  
            @endif
            </article>
		</main>
	</div>
  </div>
 </div>
</div>
@endsection