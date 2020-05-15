@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('admin.home.fzplan') }}">Назад</a><br /><br />
						<article class="page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Редактируем</h2></header>
								<div class="entry-content">
                                    <form name="feedback" method="post" action="{{ route('admin.home.fzplan.update', ['id' => $FzPlan->id]) }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                        <label for="label_id" id="label_id" class="col-md-4 col-form-label text-md-right">№: {{$FzPlan->id}}</label>
                                    </div>
                                    <div class="form-group row">
                                            <label for="year_id" class="col-md-4 col-form-label text-md-right">{{ __('Год') }}</label>
                                            <div class="col-md-6">
                                                <select name="year_id" id="year_id" class="form-control form-control-sm">
                                                    @foreach($Yeargoszak as $site_year)
                                                        <option value="{{ $site_year->id }}"
                                                            @if($FzPlan->yeargoszak->id == $site_year->id)
                                                                selected
                                                            @endif
                                                            >{{ $site_year->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ztext" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>
                                        <div class="col-md-6">
                                            <textarea id="ztext" class=" form-control{{ $errors->has('ztext') ? ' is-invalid' : '' }}" name="ztext" rows="7" cols="180" class="form-control">{{ $FzPlan->ztext }}</textarea>
                                            @if ($errors->has('ztext'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('ztext') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <b>Файлы</b><br>
                                    <div class="text-right">
                                        <a href="{{ route('admin.home.fzplan.fiels.create', ['id' => $FzPlan->id]) }}" class="btn btn-outline-info btn-sm">
                                          Добавить файл
                                        </a>
                                    </div><br />
                                    @if(count($FzPlan->fz_plans) > 0)
                                        <table class="table thead-light table-sm">
                                                <tr>
                                                    <th scope="col">Наименование</th>
                                                    <th scope="col">Дата</th>
                                                    <th scope="col">Актуальность документа</th>
                                                    <th scope="col">Управление</th>
                                                </tr>
                                                    @foreach($FzPlan->fz_plans as $af)
                                                        <tr><td>{{ $af->nfiles }}</td><td>{{ \Carbon\Carbon::parse($af->dfiles)->format('d.m.Y') }}</td>
                                                            <td>@if($af->oldfile > 0) <font color="geen">Действующий</font> @else <font color="red">Недействующий</font> @endif
                                                            <br /><a href="#">Да</a>&nbsp;&nbsp;<a href="#">Нет</a>
                                                            </td>
                                                            <td><a href="{{ Storage::url($af->fpatch) }}" class="btn btn-outline-info btn-sm">
                                                                Просмотр
                                                            </a>
                                                            <a href="{{ route('admin.home.fzplan.fiels.delete', ['id' => $af->id]) }}" class="btn btn-outline-danger btn-sm">
                                                                Х
                                                            </a>
                                                        </td></tr>
                                                    @endforeach
                                        </table>
                                    @endif
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                              {{ __('Сохранить') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection
@section('script')
    <script type="text/javascript">
        tinymce.init({
        selector: 'textarea',
        language: 'ru',
        height: 300,
        width: 800,
        menubar: true,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
    ],
    toolbar: '| undo redo | formatselect | ' +
    '| forecolor code | bold italic underline backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat',
    content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
    </script>
@endsection