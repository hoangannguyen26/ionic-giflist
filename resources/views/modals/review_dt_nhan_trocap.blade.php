@push('page-script')
<script type="text/javascript">
  $(function() {
    $('a.review_info').on('click', function() {
        $('#reviewDTNhanTrocapModal').modal('hide');
        var target = $(this).attr('target');
        if(target == 'nam_sinh' || target == 'thoi_diem_huong')
        {
          $('[name="'+target+'_day"]').focus();
        } else if(target == 'thong_tin_ca_nhan_khac' || target == 'li_do_ko_bhyt')
        {
          $('[name="'+target+'_select"]').focus();
        }
        
        $('[name="'+target+'"]').focus();
    });
  });

</script>
@endpush
<!-- Modal for add -->
<div class="modal fade" id="reviewDTNhanTrocapModal" role="dialog" aria-labelledby="reviewDTNhanTrocapModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;Thông tin của đối tượng: </h4>
        </div>
        
        <div class="modal-body">
            <form class="form-horizontal">
              <div class="form-group">
                  <label class="col-sm-3 control-label">Họ và tên:</label>
                  <a class="col-sm-3 review_info" target="ho_ten">
                  </a>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Ngày tháng năm sinh:</label>
                  <a class="col-sm-3 review_info" target="nam_sinh">
                  </a>
                  <label class="col-sm-2 control-label">Giới tính:</label>
                  <a class="col-sm-3 review_info" target="gioi_tinh">
                  </a>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Số CMND:</label>
                  <a class="col-sm-3 review_info" target="so_cmnd">
                  </a>
                  <label class="col-sm-2 control-label">Số điện thoại:</label>
                  <a class="col-sm-3 review_info" target="dien_thoai">
                  </a>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Tổ dân phố:</label>
                  <a class="col-sm-3 review_info" target="to_dan_pho">
                  </a>
                  <label class="col-sm-2 control-label">Phường:</label>
                  <a class="col-sm-3 review_info" target="ma_phuong">
                  </a>
              </div>

              <div class="form-group">
                  <label class="col-sm-3 control-label">Thời điểm hưởng:</label>
                  <a class="col-sm-3 review_info" target="thoi_diem_huong">
                  </a>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Nhóm hưởng:</label>
                  <a class="col-sm-3 review_info" target="nhom_huong">
                  </a>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Số tiền trợ cấp/Tháng:</label>
                  <a class="col-sm-3 review_info" target="so_tien_tro_cap_tren_thang">
                  </a>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Số tháng truy lĩnh:</label>
                  <a class="col-sm-3 review_info" target="truy_linh_so_thang">
                  </a>
                  <label class="col-sm-2 control-label">Số tiền truy lĩnh:</label>
                  <a class="col-sm-3 review_info" target="truy_linh_so_tien">
                  </a>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Số tháng chậm lĩnh:</label>
                  <a class="col-sm-3 review_info" target="cham_linh_so_thang">
                  </a>
                  <label class="col-sm-2 control-label">Số tiền chậm lĩnh:</label>
                  <a class="col-sm-3 review_info" target="cham_linh_so_tien">
                  </a>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Đề nghị BHYT:</label>
                  <a class="col-sm-3 review_info" target="de_nghi_bhyt">
                  </a>
                  <label class="col-sm-2 control-label">Lý do không đề nghị BHYT:</label>
                  <a class="col-sm-3 review_info" target="li_do_ko_bhyt">
                  </a>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Thông tin cá nhân khác:</label>
                  <a class="col-sm-3 review_info" target="thong_tin_ca_nhan_khac">
                  </a>
              </div>

            </form>
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i>&nbsp;Thoát</button>
        </div>
    </div>
  </div>
</div>