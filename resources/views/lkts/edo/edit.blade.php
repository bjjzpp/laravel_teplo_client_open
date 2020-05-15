@extends('layouts.site_bar_lkts')
@section('content')
<div class="col col-12">
<a href="{{ route('edo') }}">Назад</a>
	<blockquote>
            <b>Новое Заявление на подключение</b>
        </blockquote>
		<br>
		<div class="card">
            <div class="card-header">
                <center>Заполните «Заявку на подключение к системе теплоснабжения», подпишите и отсканируйте, так же приложите отсканированные копии
                из документа «Перечень документов, не обходимых для подготовки на подключение».<br>
                Файлы загружайте не более 10Мб.<br>
                Форматы файлов: jpg, png, pdf, docx, doc</center>
                <br />
                <b>Документы, Бланки</b><br />
                <a href="http://teplo.obninsk.ru/files/pconn_consumers_2_03.10.2017_Forma_zaiavki_na_podkliuchenie_k_sisteme_teplosnabzheniia.doc">Заявку на подключение к системе теплоснабжения</a><br />
                <a href="http://teplo.obninsk.ru/files/pconn_consumers_2_24.04.2017_Perechen___dokumentov.docx">Перечень документов, необходимых для подготовки на подключение</a><br />
                <a href="http://teplo.obninsk.ru/files/pconn_consumers_2_03.10.2017_Obrazec_zaiavki_na_podkliuchenie_k_sisteme_teplosnabzheniia-Fiz.lico.doc">Образец форма заявки на подключение (для физ.лиц)</a><br />
                <a href="http://teplo.obninsk.ru/files/pconn_consumers_2_03.10.2017_Obrazec_zaiavki_na_podkliuchenie_k_sisteme_teplosnabzheniia-IUr.lico.doc">Образец форма заявки на подключение (для юр.лиц)</a><br /><br /><br />
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="edo_name_object"><b>Назание подключаемого объекта</b></label><br>
                    <u>{{ $LktsEdo->edo_name_object }}</u>
                </div>
                <br />
                <b>Приложенные документы</b><br />

                    <table class="table thead-light table-sm">
                        <tr>
                            <th scope="col">Наименование</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Удалить</th>
                        </tr>
                        @if($LktsEdoFile->count() > 0)
                            @foreach ($LktsEdoFile as $lef)
                                <tr><td><a href="{{ asset('files/'.$lef->pfiles) }}">{{ $lef->nfiles }}</a></td><td>{{ \Carbon\Carbon::parse($lef->dfiles)->format('d.m.Y H:m:s') }}</td><td><form method="post" action="{{ route('edo.filedelete', ['id'=>$lef->id ])}}">{{ csrf_field() }}<button type="submit" class="pull-right btn btn-outline-danger btn-sm">Х</button></form></td></tr>
                            @endforeach
                        @else
                            <tr><td>Нет загруженных файлов!</td></tr>
                        @endif
                    </table>
                @if($LktsEdo->edo_frm == NULL)
                <br>
                <b>Форма выбора файлов позволяет выбрать несколько файлов за раз</b><br /><br />
                    <form method="post" action="{{ route('edo.fileload')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <input id="num" name="num" name="text" type="hidden" value="{{$LktsEdo->id}}" readonly><input id="file_array" type="file" name="file_array[]" multiple="true" files="true" class="btn btn-outline-info btn-sm">
                        </div><br />
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-info btn-sm pull-right">
                                Загрузить
                            </button>
                        </div>
                    </form>
                @endif
            </div>
            @if($LktsEdo->edo_frm == NULL)
                <br>
                <form method="post" action="{{ route('edo.save_send')}}">
                {{ csrf_field() }}
                <input name="sendedo" name="text" type="hidden" value="{{$LktsEdo->id}}">
                    <button type="submit" class="btn btn-sm btn-success pull-right">
                        Отправить заявку
                    </button>
                </form>
            @endif
        </div>
        </div>
		</div>
	</div>
</div>
<!-- .col col-mb-12 col-9 col-margin-bottom -->
	<div class="col col-mb-12 col-3 col-margin-bottom">
		<div class="white-box padding-box primary-border-box pt0">
			<div class="sidebar-header h4"><img src="{{ Auth::user()->avatar }}" width="35px" heigth="35px" style="border-radius:50%"><br>{{ Auth::user()->name }}</div>
				<div class="sidebar-content fz14">
                   @include('lkts.includes.nav_top')
				</div>
			</div>
		</div>
		 <!-- .col col-mb-12 col-3 col-margin-bottom -->
	</div>
@endsection
