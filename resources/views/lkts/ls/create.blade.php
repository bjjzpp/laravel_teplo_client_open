@extends('layouts.site_bar_lkts')
@section('content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('ls') }}">Назад</a><br /><br />
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Добавление Л/С</h2></header>
								<div class="entry-content">
                                <form name="feedback" method="post" action="{{ route('ls.store_ls') }}" class="form-horizontal" >
                                    @csrf
                                    <div class="form-group row">
                                        <label for="fio" class="col-md-4 col-form-label text-md-right">{{ __('Иформация о абоненте') }}</label>
                                        <div class="col-md-6 border border-info rounded">
                                            ФИО: {{ Auth::user()->lastname }} {{ Auth::user()->name }} {{ Auth::user()->middlename }} <br />
                                            Email: {{ Auth::user()->email }}
                                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
                                            <input type="hidden" name="lastname" id="lastname" value="{{ Auth::user()->lastname }}">
                                            <input type="hidden" name="firstname" id="firstname" value="{{ Auth::user()->name }}">
                                            <input type="hidden" name="middlename" id="middlename" value="{{ Auth::user()->middlename }}">
                                            <input type="hidden" name="pin" id="pin" value="{{ ImgFile::str_gen_rand() }}">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ls" class="col-md-4 col-form-label text-md-right">{{ __('Номер Л/С') }}</label>
                                        <div class="col-md-6">
                                            <input id="ls" type="text" class="form-control{{ $errors->has('ls') ? ' is-invalid' : '' }}" name="ls" value="" size="200px">
                                            <span id="status"></span>
                                            @if ($errors->has('ls'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('ls') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="ls_gis_gkx" class="col-md-4 col-form-label text-md-right">{{ __('Единый Л/С ГИС ЖКХ') }}</label>
                                            <div class="col-md-6">
                                                <input id="ls_gis_gkx" type="text" class="form-control{{ $errors->has('ls_gis_gkx') ? ' is-invalid' : '' }}" name="ls_gis_gkx" value="" size="200px">
                                                <span id="status"></span>
                                                @if ($errors->has('ls_gis_gkx'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('ls_gis_gkx') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="addr" class="col-md-4 col-form-label text-md-right">{{ __('Улица') }}</label>
                                        <div class="col-md-6">
                                            <select name="id_maps" id="id_maps" class="form-control form-control-sm">
                                                @foreach($RcoMap as $rm)
                                                    <option value="{{ $rm->id }}">{{ $rm->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="office" class="col-md-4 col-form-label text-md-right">{{ __('Кв') }}</label>
                                        <div class="col-md-6">
                                            <input id="office" type="text" class="form-control{{ $errors->has('office') ? ' is-invalid' : '' }}" name="office" value="" size="30px">
                                            @if ($errors->has('office'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('office') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="qr-code" class="col-md-4 col-form-label text-md-right">{{ __('Печать квитанций') }}</label>
                                        <div class="col-md-6 border border-info rounded">                                        
                                            <input id="ticket_ver" type="radio" name="ticket_ver" value="0" checked />ОЕИРЦ<br />
                                            <input id="ticket_ver" type="radio" name="ticket_ver" value="1" />МП Теплоснабжение
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-sm" id="btn_save">
                                                <span aria-hidden="true"> {{ __('Сохранить') }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </form><br/>
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection

@section('script')
<script type="text/javascript">
  $('#ls').on('keyup',function(){
        $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{route('ls.ls.check.system')}}',
                data:{'ls':$value},
                dataType: 'json',
                    success:function(data){
                       if($value == data[0].ls) {
                            $('#btn_save').attr('disabled','true');
                            $("#ls").addClass("is-invalid");
                            $("#ls_gis_gkx").attr('disabled', true);
                            $("#id_maps").attr('disabled', true);
                            $("#office").attr('disabled', true);
                            $("input[name='ticket_ver']").attr('disabled', true);
                            $('#status').html('<small><strong><font color="red">Л\С существует, проверьте правильность ввода Л/С. <br />Если все правильно перейдите по ссылке <br /><a href="/ls/conn_ls/'+$value+'">Подключение Л/С</a>.</font></strong></small>');
                        } else {
                            $("#ls").removeClass("is-invalid");
                            $("#btn_save").attr('disabled', false);
                            $("#ls_gis_gkx").attr('disabled', false);
                            $("#id_maps").attr('disabled', false);
                            $("#office").attr('disabled', false);
                            $("input[name='ticket_ver']").attr('disabled', false);
                            $('#status').html('');
                        }
                    }
            });
});
</script>
@endsection