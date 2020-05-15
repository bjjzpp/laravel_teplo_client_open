@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
          	<a href="{{ route('lkts') }}">Назад</a><br /><br />
							<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
								<header class="entry-header"><h2 class="entry-title">О предприятии</h2></header>
                	<div class="text-right"><a href="{{ route('admin.home.about.create') }}" class="pull-right btn btn-outline-success btn-sm">Добавить</a></div>
										<div class="entry-content">
                    	<table class="table table-borderless table-sm">
	                      <tr>
	                      	<th scope="col" style="width:86%;">Наименование</th>
	                        <th scope="col">Управление</th>
	                      </tr>
	                      @foreach ($About as $Abouts)
	                      	<tr><td>{!! $Abouts->title !!}</td><td><a href="{{ route('admin.home.about.edit', ['id' => $Abouts->id ]) }}" class="btn btn-outline-info btn-sm">Правка</a>&nbsp;<a href="{{ route('admin.home.about.delete', ['id' => $Abouts->id ]) }}" class="btn btn-outline-danger btn-sm">X</a></td></tr>
	                      @endforeach
                      </table>
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
