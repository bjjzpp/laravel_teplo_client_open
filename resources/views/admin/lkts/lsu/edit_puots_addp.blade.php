@extends('layouts.site_bar_lkts')
@section('admin_content')
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                   <a href="{{ route('admin.lkts.lsu.edit_puots', ['id' => $id]) }}">Назад</a><br /><br />
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Добавить текущие показания прибора учета</h2></header>
								<div class="entry-content">
                                <form name="feedback" method="post" action="{{ route('admin.lkts.lsu.store_puots_addp') }}" class="form-horizontal" >
                                @csrf
                                <input type="hidden" name="lkts_ls_puots_id" id="lkts_ls_puots_id" value="{{ $id }}">
                                <input type="hidden" name="lkts_ls_puots_date" id="lkts_ls_puots_date" value="{{ $lkts_ls_puot->created_at }}">
                                 <div class="form-group row">
                                        <label for="id_lkts_ls_pus" class="col-md-4 col-form-label text-md-right">{{ __('Прибор учета') }}</label>
                                        <div class="col-md-6">
                                            <select name="id_lkts_ls_pus" id="id_lkts_ls_pus" class="form-control form-control-sm">
                                                @foreach($lkts_ls_pus as $pu)
                                                    <option value="{{ $pu->test }}">{{ $pu->namepu }} ({{ $pu->numberpu }})</option>
                                                @endforeach
                                            </select>
                                            <span id="status_pu"></span>
                                        </div>
                                 </div>
                                 <div class="form-group row">
                                        <label for="pu_data" class="col-md-4 col-form-label text-md-right">{{ __('Показания') }}</label>
                                        <div class="col-md-6">
                                            <input id="pu_data" type="text" class="pu_data form-control{{ $errors->has('pu_data') ? ' is-invalid' : '' }}" name="pu_data" value="" size="200px">
                                            <span><small><font color="red">Дробные числа вводим используя точку.<br />Пример: 12.54</font></small></span>
                                            @if ($errors->has('pu_data'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('pu_data') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-sm" id="btn_save">
                                                <span aria-hidden="true"> {{ __('Добавить') }}</span>
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
    $(document).on('input', '.pu_data', function (e) {
        this.value = this.value.replace(/[^\d.]+|(\.\d{2})\d*$/g, '$1').replace(/\d(?=(?:\d{3})+(?!\d))/g, "$& ");
    });

    $('.pu_data').keydown(function(e) {
    if (this.value.includes('.') && e.keyCode === 190) {
            e.preventDefault();
        return;
    } else if (!this.value.includes('.') && e.keyCode === 190) {
        if (this.selectionStart < this.value.length - 2) {
                e.preventDefault();
            return;
        }
    }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $value = $('#id_lkts_ls_pus').val();
        $value1 = $('#lkts_ls_puots_id').val();
            $.ajax({
                type : 'get',
                url : '{{route('ls.number.pu.check.puots_addp')}}',
                data: {'id_lkts_ls_puots':$value1, '&id_lkts_ls_pus':$value},
                dataType: 'json',
                success:function(data){
                    if($value == data[0].id_lkts_ls_pus) {
                        $('#btn_save').attr('disabled','disabled');
                        $("#id_lkts_ls_pus").addClass("is-invalid");
                        $('#status_pu').html('<small><strong><font color="red">Показания по данному счетчику(ам) добавлены для отправки! </font></strong></small>');
                    } else {
                        $("#id_lkts_ls_pus").removeClass("is-invalid");
                        $('#btn_save').removeAttr('disabled');
                        $('#status_pu').html('');
                    }
                }
            });
    });
    </script>

    <script type="text/javascript">
        $('#id_lkts_ls_pus').on('change',function(){
            $value=$(this).val();
            $value1 = $('#lkts_ls_puots_id').val();
                $.ajax({
                    type : 'get',
                    url : '{{route('ls.number.pu.check.puots_addp')}}',
                    data:{'id_lkts_ls_puots':$value1, '&id_lkts_ls_pus':$value},
                    dataType: 'json',
                        success:function(data){
                            if($value == data[0].id_lkts_ls_pus) {
                                $('#btn_save').attr('disabled','disabled');
                                $("#id_lkts_ls_pus").addClass("is-invalid");
                                $('#status_pu').html('<small><strong><font color="red">Показания по данному счетчику(ам) добавлены для отправки! </font></strong></small>');
                            } else {
                                $("#id_lkts_ls_pus").removeClass("is-invalid");
                                $('#btn_save').removeAttr('disabled');
                                $('#status_pu').html('');
                            }
                        }
                });
    });
    </script>
 @endsection
