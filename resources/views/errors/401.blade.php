@extends('layouts.errors')
@section('content')
	<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-events">
                <header class="entry-header">
		            <h2 class="entry-title">Проблема с авторизацией на сайте</h2></header>
                        <div class="entry-content">
                            <h3>Уважаемый пользователь!<br />
                                <p>    
                                    1) Вы ввели не правильный email или пароль.<br />
                                    2) Восстановите свои учетные данные, через форму восстановление.<br />
                                    3) Некорректная работа сервера.
                                </p>
							              </h3> 
                        </div>
	            <footer class="entry-footer">Пожалуста, попробуйте зайти на сайт позже.</footer>
            </article>
		</main>
	</div>
  </div>
 </div>
</div>     
@endsection