<html lang="ru"><head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ env('APP_NAME') }}</title>
<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" />
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}" type="text/css" media="all" />
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-2.1.4.js') }}"></script>
<!--<script src="{{ asset('js/jquery-ui.js') }}"></script>-->
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}" charset="UTF-8"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/scrollnews.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('js/tinymce/langs/ru.js') }}"></script>
</head>
<body>
<div>
@include('lkts.includes.header')
    <div id="main-nav" class="clear-fix">
        <img  src="{{ asset('images/logo/spring.png') }}" style="width:100%;margin-right: 0px; height: 339px;" />
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
<div id="content" class="site-content">
  <div class="container">
    <div class="inner-wrapper">
    </div><!-- .inner-wrapper -->
  </div><!-- .container -->
</div><!-- #content -->
{{--<div  id="footer-widgets">
  <div class="container">
    <div class="inner-wrapper">
      @include('site.includes.social')
<div class="footer-active-4 footer-widget-area">
    <aside id="text-2" class="widget widget_text">
        <h3 class="widget-title"></h3>
        	<div class="textwidget"></div>
     </aside>
</div><!-- .footer-widget-area -->

<div class="footer-active-4 footer-widget-area">
        <aside class="widget widget_nav_menu">
                <h3 class="widget-title"></h3>
        </aside>
</div><!-- .footer-widget-area -->

<div class="footer-active-4 footer-widget-area">
    <aside id="recent-posts-3" class="widget widget_recent_entries">
        <h3 class="widget-title"></h3>
    </aside>
</div><!-- .footer-widget-area -->
</div><!-- .inner-wrapper -->
</div><!-- .container -->
--}}
</div>
        @include('lkts.includes.footer')
</div>
<script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
    </script>
@yield('script')
</body>
</html>
