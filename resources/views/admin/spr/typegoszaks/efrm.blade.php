<div class="modal fade" tabindex="-1" role="dialog" id="efrm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Редактировать</h4>
                </div>
                <form id="editfrm">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id">
                        <div class="form-group">
                            <label for="typename">Тип закупки</label>
                            <input type="text" class="form-control" id="typename" name="typename" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                    </div>
                </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->