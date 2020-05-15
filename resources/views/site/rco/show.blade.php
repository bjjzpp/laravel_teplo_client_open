@extends('layouts.site')

@section('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
          <a href="{{ route('rco') }}">Назад</a><br /><br />
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">{{ $rco->title }}</h2></header>
                        <div class="entry-content">
                            @if($rco->map == 1)
                                <b>На Яндекс.Картах</b><br>
                                    <div id="map" style="width: 920px; height:720px; padding: 0; margin: 0;"></div>
                                        <script src="https://api-maps.yandex.ru/2.1/?lang=ru-RU" type="text/javascript"></script>
                                        <script type="text/javascript">
                                            ymaps.ready(init);
                                                function init(){
                                                    var myMap = new ymaps.Map("map", {
                                                        center: [55.112010, 36.586531],
                                                        zoom: 13
                                                    }, {
                                                        searchControlProvider: 'yandex#search'
                                                    });
                                                   @foreach($rco->rco_maps as $row)
                                                        @if($row->maps_active == 0)
                                                            var myPlacemark =  new ymaps.Placemark([{{$row->maps}}], {
                                                                        balloonContent: '{{$row->description}}',
                                                                        iconCaption: '{{$row->name}}'
                                                                    }, {
                                                                        preset: 'islands#greenDotIconWithCaption'
                                                                    });
                                                                    myMap.geoObjects.add(myPlacemark);
                                                        @endif            
                                                    @endforeach
                                                    myMap.geoObjects.add(myPlacemark);
                                                }
                                        </script>
                            @endif
                            <br />
                            {!! $rco->full_text !!}
                            <br />
                            @if(count($rcomap) > 0)
                                    <b>Список домов</b><br /> <small>Количество домов на прямых договорах: <u>{{ count($rcomap) }}</u>.</small><br /><br>
                                    <table class="table table-borderless table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Наименование</th>
                                                <th scope="col">Описание</th>
                                                <th scope="col">Дата перехода</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($rcomap as $rm)
                                                @if($rm->maps_active == 0)
                                                @php $i = $rm->maps_active; @endphp
                                                    <tr>
                                                        <td>{{ $rm->name }}</td>
                                                        <td>{!! $rm->description !!}</td>
                                                        <td>{{ \Carbon\Carbon::parse($rm->dfiles)->format('d.m.Y') }}г.</td>
                                                    </tr>
                                                @endif    
                                            @endforeach
                                        </tbody>
                                    </table>    
                            @endif
                            @if(count($rco->rco_files) > 0)
                                <b>Файлы</b><br>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Наименование</th>
                                        <th>Дата</th>
                                    </tr>
                                        @foreach($rco->rco_files as $af)
                                            <tr><td>
                                            {{ ImgFile::getImgFilePath(env('APP_URL'), $af->pfiles) }}
                                            &nbsp; <a href="{{ Storage::url($af->pfiles) }}">{{ $af->nfiles }}</a></td><td>{{ \Carbon\Carbon::parse($af->dfiles)->format('d.m.Y') }}</td></tr>
                                        @endforeach
                                </table>
                            @endif
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
