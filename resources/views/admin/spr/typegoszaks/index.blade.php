@extends('layouts.site_bar_lkts')
@section('admin_content')
@include('admin.spr.typegoszaks.frm');
<div id="featured-content">
		<div class="container">
			<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
                        <a href="{{ route('lkts') }}">Назад</a><br /><br />
						<article id="post-33" class="post-33 page type-page status-publish has-post-thumbnail hentry">
							<header class="entry-header"><h2 class="entry-title">Типы размещения закупки</h2></header>
								<div class="form-group row add">
									<div class="col-md-8">
										<input type="text" class="form-control" id="typename_add" name="typename_add" placeholder="Новый тип закупки" required>
											<p class="error text-canter alert alert-danger hidden"></p>
									</div>
									<div class="col-md-4">
										<button class="btn btn-primary btn-xs" type="submit" id="add">
											<span class="glyphicon glyphicon-plus"></span>
										</button>
									</div>
								</div>
								<div class="entry-content">
									{{ csrf_field() }}
									<table class="table table-borderless" id="table">
										<thead>
											<th>№</th>
											<th>Наименование</th>
											<th>Управление</th>
										</thead>
										@foreach($Typegoszaks as $item)
											<tr class="item{{$item->id}}">
												<td>{{$item->id}}</td>
												<td>{{$item->typename}}</td>
												<td>
													<button class="edit-modal btn btn-info btn-xs"
															data-id="{{$item->id}}"
															data-typename="{{$item->typename}}">
														<span class="glyphicon glyphicon-edit"></span>
													</button>
													<button class="del-modal btn btn-danger btn-xs"
															data-id="{{$item->id}}"
															data-typename="{{$item->typename}}">
														<span class="glyphicon glyphicon-trash"></span>
													</button>
												</td>
											</tr>
										@endforeach
									</table>
								</div>
						</article>
					</main><!-- #main -->
			</div><!-- #primary -->
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function() {
	//setup
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	//edit form
	$(document).on('click', '.edit-modal', function(){
		$('#footer_action_button').text('Сохранить');
		$('#footer_action_button').addClass('glyphicon-check');
		$('#footer_action_button').removeClass('glyphicon-trash');
		$('.actionBtn').addClass('btn-success');
		$('.actionBtn').removeClass('btn-danger');
		$('.actionBtn').addClass('edit');
		$('.modal-title').text('Форма редактирования');
		$('.deleteContent').hide();
		$('.form-horizontal').show();
		$('#id').val($(this).data('id'));
		$('#typename').val($(this).data('typename'));
		$('#myModal').modal('show');
	});
	//delete form
	$(document).on('click', '.del-modal', function(){
		$('#footer_action_button').text('Удалить');
		$('#footer_action_button').addClass('glyphicon-trash');
		$('#footer_action_button').removeClass('glyphicon-check');
		$('.actionBtn').addClass('btn-success');
		$('.actionBtn').removeClass('btn-danger');
		$('.actionBtn').addClass('delete');
		$('.modal-title').text('Форма удаления');
		$('.form-horizontal').hide();
		$('.did').text($(this).data('id'));
		$('.dname').html($(this).data('typename'));
		$('.deleteContent').show();
		$('#myModal').modal('show');
	});
	//add data
	$('#add').click(function(){
		var typename_add = $('#typename_add').val();
		$.ajax({
			dataType: 'json',
			type: 'post',
			url: '/admin/spr/typegoszaks/store',
			data: {
				typename_add:typename_add
			},
			success: function(data) {
				if((data.errors))
				{
					$('.error').removeClass('hidden');
					$('.error').text(data.errors.typename_add);
				} else {
					$('.error').addClass('hidden');
					$('#table').append("<tr class='item" +data.id+ "'><td>"+data.id+"</td><td>"+data.typename+"</td><td>"
									+ "<button class='edit-modal btn btn-info btn-xs' data-id='"+data.id+"' data-typename='"+data.typename+"'><span class='glyphicon glyphicon-edit'></span></button>"
									+ " <button class='del-modal btn btn-danger btn-xs' data-id='"+data.id+"' data-typename='"+data.typename+"'><span class='glyphicon glyphicon-trash'></span></button></td></tr>");
				}
			},
		});
		$('#typename_add').val('');
	});
	//update data
	$('.modal-footer').on('click', '.edit', function(){
		var id = $('#id').val();
		var typename = $('#typename').val();
		$.ajax({
			dataType: 'json',
			type: 'get',
			url: '/admin/spr/typegoszaks/edit/' + id,
			data: {
				_token: '{{ csrf_token() }}',
				id: id,
				typename: typename
			},
			success: function(data){
				$('.item' + data.id).replaceWith("<tr class='item" +data.id+ "'><td>"+data.id+"</td><td>"+data.typename+"</td><td>"
				+ "<button class='edit-modal btn btn-info btn-xs' data-id='"+data.id+"' data-typename='"+data.typename+"'><span class='glyphicon glyphicon-edit'></span></button>"
				+ " <button class='del-modal btn btn-danger btn-xs' data-id='"+data.id+"' data-typename='"+data.typename+"'><span class='glyphicon glyphicon-trash'></span></button></td></tr>");
			}
		});
	});
	//delete data
	$('.modal-footer').on('click', '.delete', function(){
		var id = $('.did').text();
        $.ajax({
            type: 'DELETE',
            url: '/admin/spr/typegoszaks/delete/' + id,
            success: function(data)
            {
                console.log(id);
                $('.item' + id).remove();
            },
            error: function(data)
            {
                console.log('Error', data);
            }
        });
	});
});
</script>
@endsection
