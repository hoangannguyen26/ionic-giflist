<!-- Trigger the modal with a button -->
<!-- Modal -->
<div id="modal_detail" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="printThis">

				<page size="A4">
					<div class="head_container">
						<div class="dia-chi">
							<li>BHXH TP ĐÀ NẴNG</li>
							<li>BHXH <span class="township_name"></span></li>
							<li>Số:           /TB-BHXH</li>
						</div>
						<div class="mau">
							<li><b>Mẫu C12-TS</b></li>
							<li>(Ban hành kèm theo QĐ số: 959/QĐ-BHXH</li>
							<li>ngày 09/9/2015 của BHXH Việt Nam)</li>
						</div>
					</div>
					<div class="title">
						<li>THÔNG BÁO KẾT QUẢ ĐÓNG BHXH, BHYT, BHTN</li>
						<li>Tháng <span class="thang"></span> năm <span class="nam"></span></li>
					</div>
					<div class="kinh_gui">
						<li class="tendvi">Kính gửi: <span class="tenDonVi"></span></li>
						<li>Mã đơn vị: <span class="maDonVi"></span></li>
						<li>Địa chỉ: <span class="diaChiDonVi"></span></li>
					</div>
					<div class="co_quan_bao_hiem">
						<li>BHXH <span class="township_name"></span></li>
						<li>Địa chỉ: <span class="township_address"></span></li>
						<span class="bank_infos">
						</span>
						<li>Thông báo kết quả đóng BHXH, BHYT, BHTN của đơn vị như sau:</li>
					</div>
					<table class="table-bordered" id = "table_detail_infos">
						<thead>
							<tr>
								<th style="width:68px">STT</th>
								<th style="width:180px">NỘI DUNG</th>
								<th style="width:128px">BHXH</th>
								<th style="width:120px">BHYT</th>
								<th style="width:120px">BHTN</th>
								<th style="width:143px">CỘNG</th>
							</tr>
							<tr>
								<th>A</th>
								<th>B</th>
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th>4 = 1 +2+3</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="first-row bold">A</td>
								<td class="bold">Kỳ trước mang sang</td>
								<td class="right bold"><span class="bhxh_kyTruocMangSang"></span></td>
								<td class="right bold"><span class="bhyt_kyTruocMangSang"></span></td>
								<td class="right bold"><span class="bhtn_kyTruocMangSang"></span></td>
								<td class="right bold"><span class="tongCong_kyTruocMangSang"></span></td>
							</tr>
							<tr>
								<td class="first-row">1</td>
								<td class="italic bold">Số lao động</td>
								<td class="right"><span class="bhxh_kyTruoc_soLD"></span></td>
								<td class="right"><span class="bhyt_kyTruoc_soLD"></span></td>
								<td class="right"><span class="bhtn_kyTruoc_soLD"></span></td>
								<td class="right"><span></span></td>
							</tr>
							<tr>
								<td class="first-row">2</td>
								<td class="italic bold">Phải đóng</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="first-row">2.1</td>
								<td>Thừa</td>
								<td></td>
								<td></td>
								<td></td>
								<td class="right"><span class="tongCong_kyTruoc_phaiDong_thua"></span></td>
							</tr>
							<tr>
								<td class="first-row">2.2</td>
								<td>Thiếu</td>
								<td class="right"><span class="bhxh_kyTruoc_phaiDong_thieu"></span></td>
								<td class="right"><span class="bhyt_kyTruoc_phaiDong_thieu"></span></td>
								<td class="right"><span class="bhtn_kyTruoc_phaiDong_thieu"></span></td>
								<td class="right"><span class="tongCong_kyTruoc_phaiDong_thieu"></span></td>
							</tr>
							<tr>
								<td class="first-row">3</td>
								<td class="italic bold">Thiếu lãi</td>
								<td class="right"><span class="bhxh_kyTruoc_thieu_lai"></span></td>
								<td class="right"><span class="bhyt_kyTruoc_thieu_lai"></span></td>
								<td class="right"><span class="bhtn_kyTruoc_thieu_lai"></span></td>
								<td class="right"><span class="tongCong_kyTruoc_thieu_lai"></span></td>
							</tr>
							<tr>
								<td class="first-row bold">B</td>
								<td class="bold">Phát sinh trong kỳ</td>
								<td class="right bold"><span class="bhxh_psTrongKy"></span></td>
								<td class="right bold"><span class="bhyt_psTrongKy"></span></td>
								<td class="right bold"><span class="bhtn_psTrongKy"></span></td>
								<td class="right bold"><span class="tongCong_psTrongKy"></span></td>
							</tr>
							<tr>
								<td class="first-row">1</td>
								<td class="italic bold">Số lao động</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="first-row">1.1</td>
								<td>Tăng</td>
								<td class="right"><span class="bhxh_psTrongKy_soLD_tang"></span></td>
								<td class="right"><span class="bhyt_psTrongKy_soLD_tang"></span></td>
								<td class="right"><span class="bhtn_psTrongKy_soLD_tang"></span></td>
								<td class="right"><span></span></td>
							</tr>
							<tr>
								<td class="first-row">1.2</td>
								<td>Giảm</td>
								<td class="right"><span class="bhxh_psTrongKy_soLD_giam"></span></td>
								<td class="right"><span class="bhyt_psTrongKy_soLD_giam"></span></td>
								<td class="right"><span class="bhtn_psTrongKy_soLD_giam"></span></td>
								<td class="right"><span></span></td>
							</tr>
							<tr>
								<td class="first-row">2</td>
								<td class="italic bold">Phải đóng</td>
								<td class="right"><span class="bhxh_psTrongKy_phaiDong"></span></td>
								<td class="right"><span class="bhyt_psTrongKy_phaiDong"></span></td>
								<td class="right"><span class="bhtn_psTrongKy_phaiDong"></span></td>
								<td class="right"><span class="tongCong_psTrongKy_phaiDong"></span></td>
							</tr>
							<tr>
								<td class="first-row">2.1</td>
								<td>Tăng</td>
								<td class="right"><span class="bhxh_psTrongKy_phaiDong_tang"></span></td>
								<td class="right"><span class="bhyt_psTrongKy_phaiDong_tang"></span></td>
								<td class="right"><span class="bhtn_psTrongKy_phaiDong_tang"></span></td>
								<td class="right"><span class="tongCong_psTrongKy_phaiDong_tang"></span></td>
							</tr>
							<tr>
								<td class="first-row">2.2</td>
								<td>Giảm</td>
								<td class="right"><span class="bhxh_psTrongKy_phaiDong_giam"></span></td>
								<td class="right"><span class="bhyt_psTrongKy_phaiDong_giam"></span></td>
								<td class="right"><span class="bhtn_psTrongKy_phaiDong_giam"></span></td>
								<td class="right"><span class="tongCong_psTrongKy_phaiDong_giam"></span></td>
							</tr>
							<tr>
								<td class="first-row">3</td>
								<td class="italic bold">Điều chỉnh phải đóng kỳ trước</td>
								<td class="right"><span class="bhxh_psTrongKy_dieuChinhPDKT"></span></td>
								<td class="right"><span class="bhyt_psTrongKy_dieuChinhPDKT"></span></td>
								<td class="right"><span class="bhtn_psTrongKy_dieuChinhPDKT"></span></td>
								<td class="right"><span class="tongCong_psTrongKy_dieuChinhPDKT"></span></td>
							</tr>
							<tr>
								<td class="first-row">3.1</td>
								<td>Tăng</td>
								<td class="right"><span class="bhxh_psTrongKy_dieuChinhPDKT_tang"></span></td>
								<td class="right"><span class="bhyt_psTrongKy_dieuChinhPDKT_tang"></span></td>
								<td class="right"><span class="bhtn_psTrongKy_dieuChinhPDKT_tang"></span></td>
								<td class="right"><span class="tongCong_psTrongKy_dieuChinhPDKT_tang"></span></td>
							</tr>
							<tr>
								<td class="first-row">3.2</td>
								<td>Giảm</td>
								<td class="right"><span class="bhxh_psTrongKy_dieuChinhPDKT_giam"></span></td>
								<td class="right"><span class="bhyt_psTrongKy_dieuChinhPDKT_giam"></span></td>
								<td class="right"><span class="bhtn_psTrongKy_dieuChinhPDKT_giam"></span></td>
								<td class="right"><span class="tongCong_psTrongKy_dieuChinhPDKT_giam"></span></td>
							</tr>
							<tr>
								<td class="first-row">3.3</td>
								<td>Điều chỉnh</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="first-row">4</td>
								<td class="italic bold">Lãi </td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="first-row">4.1</td>
								<td class="italic bold">Số tiền tính lãi</td>
								<td class="right"><span class="bhxh_psTrongKy_soTienTinhLai"></span></td>
								<td class="right"><span class="bhyt_psTrongKy_soTienTinhLai"></span></td>
								<td class="right"><span class="bhtn_psTrongKy_soTienTinhLai"></span></td>
								<td class="right"><span class="tongCong_psTrongKy_soTienTinhLai"></span></td>
							</tr>
							<tr>
								<td class="first-row">4.2</td>
								<td class="italic bold">Tỷ lệ tính lãi</td>
								<td class="right"><span class="bhxh_psTrongKy_tiLeTinhLai"></span></td>
								<td class="right"><span class="bhty_psTrongKy_tiLeTinhLai"></span></td>
								<td class="right"><span class="bhtn_psTrongKy_tiLeTinhLai"></span></td>
								<td class="right"><span></span></td>
							</tr>
							<tr>
								<td class="first-row">4.3</td>
								<td class="italic bold">Tổng tiền lãi</td>
								<td class="right"><span class="bhxh_psTrongKy_tongTienLai"></span></td>
								<td class="right"><span class="bhyt_psTrongKy_tongTienLai"></span></td>
								<td class="right"><span class="bhtn_psTrongKy_tongTienLai"></span></td>
								<td class="right"><span class="tongCong_psTrongKy_tongTienLai"></span></td>
							</tr>
							<tr>
								<td class="first-row">5</td>
								<td class="italic bold">2% BHXH bắt buộc để lại</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="first-row bold">C</td>
								<td class="bold">Số tiền đã nộp trong kỳ</td>
								<td class="right bold"><span class="bhxh_soTienDaNopTrongKy"></span></td>
								<td class="right bold"><span class="bhyt_soTienDaNopTrongKy"></span></td>
								<td class="right bold"><span class="bhtn_soTienDaNopTrongKy"></span></td>
								<td class="right bold"><span class="tongCong_soTienDaNopTrongKy"></span></td>
							</tr>
							<tr>
								<td class="first-row">1</td>
								<td class="italic">Số thực nộp</td>
								<td class="right"><span class="bhxh_soTienDaNopTrongKy_soThucNop"></span></td>
								<td class="right"><span class="bhyt_soTienDaNopTrongKy_soThucNop"></span></td>
								<td class="right"><span class="bhtn_soTienDaNopTrongKy_soThucNop"></span></td>
								<td class="right"><span class="tongCong_soTienDaNopTrongKy_soThucNop"></span></td>
							</tr>
							<tr>
								<td class="first-row"></td>
								<td class="italic">+ UNC số 00025</td>
								<td class="right"><span></span></td>
								<td class="right"><span></span></td>
								<td class="right"><span></span></td>
								<td class="right"><span class="tongCong_UNC"></span></td>
							</tr>
							<tr>
								<td class="first-row"></td>
								<td class="italic">Trong đó lãi</td>
								<td class="right"><span class="bhxh_soTienDaNopTrongKy_tienThuLai"></span></td>
								<td class="right"><span class="bhyt_soTienDaNopTrongKy_tienThuLai"></span></td>
								<td class="right"><span class="bhtn_soTienDaNopTrongKy_tienThuLai"></span></td>
								<td class="right"><span class="tongCong_soTienDaNopTrongKy_tienThuLai"></span></td>
							</tr>
							<tr>
								<td class="first-row">2</td>
								<td class="italic">Ghi chú 2 %</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="first-row bold">D</td>
								<td class="bold">Chuyển kỳ sau</td>
								<td class="right bold"><span class="bhxh_chuyenKySau"></span></td>
								<td class="right bold"><span class="bhyt_chuyenKySau"></span></td>
								<td class="right bold"><span class="bhtn_chuyenKySau"></span></td>
								<td class="right bold"><span class="tongCong_chuyenKySau"></span></td>
							</tr>
							<tr>
								<td  class="first-row">1</td>
								<td class="italic bold">Số lao động</td>
								<td class="right"><span class="bhxh_chuyenKySau_soLD"></span></td>
								<td class="right"><span class="bhyt_chuyenKySau_soLD"></span></td>
								<td class="right"><span class="bhtn_chuyenKySau_soLD"></span></td>
								<td class="right"><span></span></td>
							</tr>
							<tr>
								<td class="first-row">2</td>
								<td class="italic bold">Phải đóng</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="first-row">2.1</td>
								<td>Thừa</td>
								<td class="right"><span class="bhxh_chuyenKySau_phaiDong_thua"></span></td>
								<td class="right"><span class="bhyt_chuyenKySau_phaiDong_thua"></span></td>
								<td class="right"><span class="bhtn_chuyenKySau_phaiDong_thua"></span></td>
								<td class="right"><span class="tongCong_chuyenKySau_phaiDong_thua"></span></td>
							</tr>
							<tr>
								<td class="first-row">2.2</td>
								<td>Thiếu</td>
								<td class="right"><span class="bhxh_chuyenKySau_phaiDong_thieu"></span></td>
								<td class="right"><span class="bhyt_chuyenKySau_phaiDong_thieu"></span></td>
								<td class="right"><span class="bhtn_chuyenKySau_phaiDong_thieu"></span></td>
								<td class="right"><span class="tongCong_chuyenKySau_phaiDong_thieu"></span></td>
							</tr>
							<tr>
								<td class="first-row">3</td>
								<td>Thiếu lãi</td>
								<td class="right"><span class="bhxh_chuyenKySau_lai_thieu"></span></td>
								<td class="right"><span class="bhyt_chuyenKySau_lai_thieu"></span></td>
								<td class="right"><span class="bhtn_chuyenKySau_lai_thieu"></span></td>
								<td class="right"><span class="tongCong_chuyenKySau_lai_thieu"></span></td>
							</tr>
						</tbody>
					</table>
					<div class="luu_y">
						<li><strong>Lưu ý:</strong></li>
						<li>a) Kết quả đơn vị đã đóng BHXH bắt buộc cho <span class="bhxh_chuyenKySau_soLD"></span> lao động đến hết tháng <span class="thanght"></span></li>
						<li>b) Kết quả đơn vị đã đóng BHTN bắt buộc cho <span class="bhtn_chuyenKySau_soLD"></span> lao động đến hết tháng <span class="thanghtyt"></span></li>
						<span class="thong_bao_no"></span>
						<li>d) Đề nghị đơn vị kiểm tra số liệu trên, nếu chưa thống nhất đề nghị đến cơ quan BHXH&nbsp;<span class="township_name"></span>&nbsp;để kiểm tra điều chỉnh trước ngày 10/<span class="ngay_het_han"></span>. Quá thời hạn trên nếu đơn vị không đến, số liệu trên là đúng.</li>
					</div>
					<div class="footer-container">
						<div class="left">
							<li>&nbsp;</li>
							<li><strong>Cán bộ thu</strong></li>
							<li>(Ký, ghi rõ họ tên)</li>
						</div>
						<div class="right">
							<li>……..,ngày……tháng…..năm……….</li>
							<li><strong>Giám đốc</strong></li>
							<li>(ký, ghi rõ họ tên và đóng dấu)</li>
							<li>Đã ký</li>

						</div>
					</div>

				</page>


			</div>
			<div class="modal-footer">
<div>
					<div class="g-plusone" data-annotation="inline" data-width="300">
					</div>
					<div
					  class="fb-like"
					  data-share="true"
					  data-width="450"
					  data-show-faces="true">
					</div>
				</div>
				<button id="btn_print" type="button" class="btn btn-default glyphicon glyphicon-print">Print</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>