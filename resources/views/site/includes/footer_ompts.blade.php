<div  id="footer-widgets" ><div class="container"><div class="inner-wrapper">
    @include('site.includes.social')

<div class="footer-active-4 footer-widget-area">
    <aside id="text-2" class="widget widget_text">
        <h3 class="widget-title">История</h3>
        	<div class="textwidget">
                <p>
					<i>Год ввода в эксплуатацию</i> <br>
					<span class="thead-light">1971</span>
				</p>
				<p>
					<i>Мощность</i> <br>
					<span class="thead-light">610.13 Гкал/ч</span>
				</p>
				<p>
					<i>Общая нагрузка потребителей</i> <br>
					<span class="thead-light">430.426 Гкал/ч</span>
				</p>
            </div>
    </aside>
</div><!-- .footer-widget-area -->

<div class="footer-active-4 footer-widget-area">
    <aside class="widget widget_nav_menu">
        <h3 class="widget-title">Место нахождение</h3>
            <p>
				<i>Географическое положение</i> <br>
				<span class="thead-light">Город Обнинск расположен в 100 километрах на юго-запад по Киевскому шоссе от Москвы, на р. Протва. <br />На картах: 55.107799, 36.628007</span>
			</p>
    </aside>
</div><!-- .footer-widget-area -->

<div class="footer-active-4 footer-widget-area">
    <aside id="recent-posts-3" class="widget widget_recent_entries">
        <h3 class="widget-title">Счетчики</h3>
		{!! $SiteSetting->counts !!}
    </aside></div><!-- .footer-widget-area --></div><!-- .inner-wrapper --></div><!-- .container --></div>
