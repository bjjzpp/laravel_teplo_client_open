@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Стандарты раскрытия</h2></header>
							<div class="text-right"><a href="{{ route('admin.home.standart.create') }}" class="pull-right btn btn-outline-success btn-sm">Добавить</a></div>
								<div class="entry-content">
                                        <table class="table table-borderless table-sm">
                                                <tr><th scope="col" style="width:86%;">Наименование</th>
                                                <th scope="col">Год</th>
                                                <th scope="col">Управление</th></tr>
                                                @foreach ($StandartBf as $sbf)
                                                    <tr><td>{!! $sbf->ztext !!}</td><td><center>{{ $sbf->yeargoszak->title }}</center></td><td><a href="{{ route('admin.home.standart.edit', ['id' => $sbf->id ]) }}" class="btn btn-outline-info btn-sm">Правка</a>&nbsp;<a href="{{ route('admin.home.standart.delete', ['id' => $sbf->id ]) }}" class="btn btn-outline-danger btn-sm">Х</a></td></tr>
                                                @endforeach
                                        </table>
                                        {{ $StandartBf->links() }}
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
