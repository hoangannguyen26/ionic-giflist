<!-- Modal for add -->
<div class="modal fade" id="thongTinTrung" role="dialog" aria-labelledby="thongTinTrung" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-alert"></span>&nbsp;&nbsp;Cảnh báo trùng</h4>
            </div>
            <div class="modal-body">
                <h4>Danh sách đối tượng có thông tin trùng với <span class="tenTrung"></span>:</h4>
                <p>(Click vào để xem chi tiết)</p>
                <hr>
                <div class="scoll-tree">
                    <table class="table table-striped header-fixed" id="tbl_danh_sach_trung" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                               <th>Số TT</th>
                               <th>Họ và tên</th>
                               <th>Ngày tháng năm sinh</th>
                               <th>Phường</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="checkbox">
                  <label><input id="tatThongBaoTrung" type="checkbox"/><strong>Tắt thông báo trùng cho đối tượng <span class="tenTrung"></span></strong></label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-close"></i>&nbsp;Đóng</button>
            </div>
        </div>
    </div>
</div>