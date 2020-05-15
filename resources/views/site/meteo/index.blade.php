@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">Метео-данные: информация с метеостанции МП "Теплоснабжение" г.Обнинск</h2></header>
                        <div class="entry-content">
                            @if(isset($Page))
                            {!! $Page->slime_text !!}
                            <br><br>
                            {!! $Page->full_text !!}
                            @endif
                            Текущие данные на: {{ \Carbon\Carbon::parse($Meteo->data_m)->format('d.m.Y') }}, температура: {{ $Meteo->tem }}<br /><br />

                            <b>Запрос архивных данных темературы</b><br>
                            <!--<form class="form-inline" action="{{ route('meteo.show') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Период с</label>
                                <input type="text" id="datas" name="datas" class="form-control" autocomplete="off" readonly="true" placeholder="01.12.2018" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">по:</label>
                                <input type="text" id="datap" name="datap" class="form-control" autocomplete="off" readonly="true" placeholder="31.12.2018" />
                            &nbsp;&nbsp;
                            <button type="submit" class="btn btn-success pull-right">
                                Запрос
                            </button></div>
                            </form>-->
                		</div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	            <footer class="entry-footer"></footer>
            </article>
		</main>
	</div>
  </div>
 </div>

@endsection