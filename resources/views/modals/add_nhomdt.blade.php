<!-- Modal for add -->
<div class="modal fade" id="addnhomDTModal" role="dialog" aria-labelledby="addnhomDTModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="#" id="addnhomDTForm" method="POST" class="form-horizontal">
      {{ csrf_field() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Thêm nhóm đối tượng</h4>
        </div>
        <div class="modal-body">
          <div class="response_message"></div>
            @include('nhomdt.add_fields')
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Thêm nhóm đối tượng</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i>&nbsp;Thoát</button>
        </div>
      </form>
    </div>
  </div>
</div>