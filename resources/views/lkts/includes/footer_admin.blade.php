<footer id="colophon" class="site-footer" role="contentinfo">
            <div class="container">    
	    		<div class="copyright">
	                @if(Auth::check())
                        @if(Auth::user()->theusers)
                            Админ-Центер<br />
                            Copyright &copy; {{ getenv('APP_CORP_YEAR') }} {{ getenv('APP_NAME') }}
                        @else
                            Личный кабинет<br />
                            Copyright &copy; {{ getenv('APP_CORP_YEAR') }} {{ getenv('APP_NAME') }} <br />
                            {{ getenv('APP_EMAIL_OFF') }}
                        @endif
                    @endif    
                </div><!-- .copyright -->
	    	<div class="site-info">
            </div><!-- .site-info -->
	    </div><!-- .container -->
</footer><!-- #colophon -->