@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.lkts.lsu') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
                        <header class="entry-header"><h2 class="entry-title">{{ $Street }}</h2></header>
								<div class="entry-content">
                                    <table class="table table-borderless table-sm">
                                        <thead>
                                          <tr>
                                            <th scope="col">Кв</th>
                                            <th scope="col">Л/С</th>
                                            <th scope="col">ФИО</th>
                                            <th scope="col">Управление</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($LktsLs as $item)
                                            <tr>
                                                <th scope="row">{{ $item->office }}</th>
                                                <td>{{ $item->ls }}</td>
                                                <td>{{ $item->lastname }} {{ $item->firstname }} {{ $item->middlename }}</td>
                                                <td>
                                                    <a class="btn btn-outline-info btn-sm" href="{{ route('admin.lkts.lsu.edit', ['id' => $item->id]) }}">
                                                        Просмотр
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach                                    
                                        </tbody>
                                      </table>
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
