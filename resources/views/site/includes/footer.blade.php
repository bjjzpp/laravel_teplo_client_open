<footer id="colophon" class="site-footer" role="contentinfo">
            <div class="container">    
	    		<div class="copyright">
	                {!! $SiteSetting->copyright !!}     
                </div><!-- .copyright -->
	    	    <div class="site-info">
                <address>
                {!! $SiteSetting->address !!}
                <abbr title="Phone"></abbr> {{ $SiteSetting->phone }}<br>
                <a href="mailto:{{ $SiteSetting->email }}?subject=Вопрос в приемную">{{ $SiteSetting->email }}</a>
                </address>
                </div><!-- .site-info -->
	    	</div><!-- .container -->
</footer><!-- #colophon -->