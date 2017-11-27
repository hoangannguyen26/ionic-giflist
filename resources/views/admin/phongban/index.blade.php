<!-- resources/views/admin/phongbans/index.blade.php -->
@extends('layouts.app')

@push('page-script')
<script>
    $(function(){
        $("#addphongban").validate({
            rules:
            {
                ten_phong_ban: {
                    required: true,
                }
            },
            messages:
            {
                ten_phong_ban: {
                    required: "Nhập tên bộ phận",
                }
            },
            showErrors: function (errorMap, errorList) {
                $.each(this.successList, function (index, value) {
                    return $(value).popover("hide");
                });
                return $.each(errorList, function (index, value) {
                var _popover;
                console.log(value.message);
                _popover = $(value.element).popover({
                    trigger: "manual",
                    placement: "top",
                    content: value.message,
                    template: "<div class=\"popover\"><div class=\"arrow\"></div><div class=\"popover-inner\"><div class=\"popover-content\"><p></p></div></div></div>"
                    });
                    _popover.data("bs.popover").options.content = value.message;
                    return $(value.element).popover("show");
                });
            },
            submitHandler: function(form){
                form.submit();
            }
        });
    });
</script>

@endpush

@section('content')
<!-- HTML here -->
	<!-- Form add new nhomdt -->
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-head-line">Danh sách bộ phận</h4>
        </div>
    </div>
	<form action="{{ url('/admin/phongban') }}" id="addphongban" method="POST" class="form-horizontal">
        {{ csrf_field() }}
            @include('admin.phongban.add_fields')
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i>Thêm bộ phận
                </button>
                <a href="{{ url('/admin/congvans') }}" class="btn btn-danger" role="button"><i class="fa fa-arrow-left"></i>Trở lại quản lý công văn</a>
            </div>
        </div>
    </form>
	@if (count($phongbans) > 0)
		<div class="panel panel-default">
            <div class="panel-heading">
                Danh sách bộ phận
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">

                    <!-- Table Headings -->
                    <thead>
                        <th>Tên bộ phận</th>
                        <th>Chú thích</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($phongbans as $phongban)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $phongban->ten_phong_ban }}</div>
                                </td>
                                <td class="table-text"> 
                                    <div>{{ $phongban->chu_thich }}</div>
                                </td>
                                <td>
                                    <div>
                                        <a class="btn btn-primary" href="{{ url('/admin/phongban/edit/'.$phongban->id) }}"><i class="fa fa-edit"></i> Sửa</a>
                                    </div>
                                </td>
                                    <td>
                                    <form action="{{ url('/admin/phongban/'.$phongban->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
			</div>
    	</div>
	@endif
@endsection