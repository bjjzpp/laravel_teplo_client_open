<!DOCTYPE html>
<html lang="ru"><head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="Муниципальное предприятие «Теплоснабжение», Калужская область г.Обнинск"/>
<meta name="keywords" content="Теплоснабжение, тепло, теплосети, госзакупки, ФЗ-223,"/>
<title>{{ env('APP_NAME') }}</title>
<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" />
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}" type="text/css" media="all" />
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-2.1.4.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/scrollnews.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif
</script>
</head>
<body>
<div>
@include('site.includes.header')
    <div id="main-nav" class="clear-fix">
        <img src="{{ asset('images/logo/spring.png') }}" style="width:100%;margin-right: 0px; height: 339px;" />
        <div class="container">
          @include('site.includes.navigation')
        </div> <!-- .container -->
    </div> <!-- #main-nav -->

<div id="featured-content">
		<div class="container">
			<div class="inner-wrapper featured-content-column-1">
				<article>
						<div class="entry-content">
							@if($errors->count() > 0)
                                <ul class="list-group-item">
                                    @foreach ($errors->all() as $error)
                                        <li class="list-group-item text-danger">
                                        {{$error}}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
						</div>
				</article>
			</div>
		</div>
	</div>

    @yield('content')
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
@include('site.includes.promo')
</div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content -->
	@include('errors.includes.footer_ompts')
    @include('errors.includes.footer')
</div>
</body>
</html>
