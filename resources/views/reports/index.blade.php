<!-- resources/views/reports/index.blade.php -->
@extends('layouts.app')

@push('page-script')
<script src="{{ URL::asset('datatable-1-10-12/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('js/report.js') }}"></script>



<link href="{{ URL::asset('datatable-1-10-12/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/report.css') }}" rel="stylesheet" type="text/css">

<script type="text/javascript">
    $(function(){
        var tableId = 'tbl_listUserInfos';
        @if (Auth::check() && Auth::user()->isAdmin())
        var offset = 2;
        @else
        var offset = 0;
        @endif
        var dataTable = $('#'+tableId).DataTable({
            processing: true,
            serverSide: true,
            language: {
                "url":"{{ URL::asset('js/datatable-vi.json') }}"
            },
            ajax: "{{ URL::asset('/user/api/reports') }}",
            error: function(){  // error handling
                $("."+tableId+"-error").html("");
                $("#"+tableId).append('<tbody class="'+tableId+'-error"><tr><th colspan="3">Không tìm thấy dữ liệu</th></tr></tbody>');
                $("#"+tableId+"_processing").css("display","none");
                 
            },
            columns: [
                { data: 'rownum', name: 'rownum' },
            @if (Auth::check() && Auth::user()->isAdmin())
                { data: 'madvi', name: 'madvi' },
                { data: 'tendvi', name: 'tendvi' },
            @endif
                { data: 'thang', name: 'thang' },
                { data: 'tong', name: 'tong' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'id', name: 'id' },
            ],
            "order": [[1 + offset, 'desc']],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                },
                {
                    "targets": 1 + offset,
                    "render": function ( data, type, row ) {
                        if(data != null)
                            return data.substring(4,6) + '/' + data.substring(0, 4);
                        else
                            return "";
                    }
                },
                {
                    "targets": 2 + offset,
                    "searchable": false,
                    "render": function ( data, type, row ) {
                       // alert(data);
                        if (row.du_ck > 0)
                            return 'Thừa: ' + prettyFloat(row.du_ck) + ' đồng';
                        else if (data < 0)
                            return 'Thừa: ' + prettyFloat(Math.abs(data)) + ' đồng';
                        else
                            return 'Thiếu: ' + prettyFloat(Math.abs(data)) + ' đồng';
                    },
                },
                {
                    "targets": 3 + offset,
                    render: function(data, type, row) {
                        var min = data.substring(14, 16);
                        var h = data.substring(11, 13);

                        var d = data.substring(8, 10);
                        var m = data.substring(5, 7);
                        var y = data.substring(0, 4);
                        return h +'h'+min+' - '+d +'/' + m +'/'+y;
                    }
                },
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 4 + offset,
                    render: function(data, type, row) {
                    @if (Auth::check() && Auth::user()->isAdmin())
                        return '<input type="hidden" value="'+data+'"><button type="button" class="btn"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Chi tiết</button>';
                    @else
                        return '<input type="hidden" value="'+data+'"><button type="button" class="btn"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Xem chi tiết</button>';
                    @endif
                    }
                },
            ]
        });
        $("#"+tableId+" tbody").on('click', 'button', function () {
            var reportId = $(this).closest('td').find('input[type="hidden"]').val();
            if(reportId != "")
            {
                var url = "{{ url('/user/api/report') }}/"+reportId;
                var item_Url = "{{ url('/user/thong-bao-bhxh') }}/"+reportId;
                $('.fb-like').data('href', item_Url);
                fillReport(url);
                $('#modal_detail').modal('show');
            }
        });

        $("#btn_print").on('click', function() {
            printElement(document.getElementById("printThis"));
        });
        function printElement(elem) {
            var domClone = elem.cloneNode(true);

            var $printSection = document.getElementById("printSection");

            if (!$printSection) {
                var $printSection = document.createElement("div");
                $printSection.id = "printSection";
                document.body.appendChild($printSection);
            }

            $printSection.innerHTML = "";
            $printSection.appendChild(domClone);
            window.print();
        }
    });
</script>

@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Danh sách thông báo BHXH</h4>
    </div>
</div>
<table id="tbl_listUserInfos" class="display cell-border" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Stt</th>
        @if (Auth::check() && Auth::user()->isAdmin())
            <th>Mã đơn vị</th>
            <th>Tên đơn vị</th>
        @endif
            <th>Tháng</th>
            <th>Tổng tiền (thừa/thiếu)</th>
            <th>Cập nhật lần cuối</th>
            <th></th>
        </tr>
    </thead>
</table>
@include('reports.report_modal')
@endsection