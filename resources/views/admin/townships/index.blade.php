<!-- resources/views/admin/townships/index.blade.php -->
@extends('layouts.app')

@push('page-script')
<script>
    $(function(){
        $("#addTownShip").validate({
            rules:
            {
                township_id: {
                    required: true,
                    number: true,
                },
                township_name: {
                    required: true,
                },
                address: {
                    required: true,
                },
                bank_info: {
                    required: true,
                },
            },
            messages:
            {
                township_id: {
                    required: "Nhập mã quận/huyện",
                    number: "Mã quận phải là một số",
                },
                township_name: {
                    required: "Nhập tên quận/huyện",
                },
                address: {
                    required: "Nhập địa chỉ của quận/huyện",
                },
                bank_info: {
                    required: "Nhập thông tin ngân hàng",
                },
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
            <h4 class="page-head-line">Danh sách Quận/Huyện</h4>
        </div>
    </div>
	<form action="{{ url('/admin/township') }}" id="addTownShip" method="POST" class="form-horizontal">
        {{ csrf_field() }}
            @include('admin.townships.add_fields')
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i>Thêm quận
                </button>
            </div>
        </div>
    </form>
	@if (count($townships) > 0)
		<div class="panel panel-default">
            <div class="panel-heading">
                Danh sách công văn
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">

                    <!-- Table Headings -->
                    <thead>
                        <th>Mã Quận</th>
                        <th>Tên Quận</th>
                        <th>Địa chỉ</th>
                        <th>Thông tin ngân hàng</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($townships as $township)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $township->township_id }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $township->township_name }}</div>
                                </td>
                                <td class="table-text"> 
                                    <div>{{ $township->address }}</div>
                                </td>
                                <td class="table-text"> 
                                    <div>{{ $township->bank_info }}</div>
                                </td>
                                <td>
                                    <div>
                                        <a class="btn btn-primary" href="{{ url('/admin/township/edit/'.$township->township_id) }}"><i class="fa fa-edit"></i> Sửa</a>
                                    </div>
                                </td>
                                    <td>
                                    <form action="{{ url('/admin/township/'.$township->township_id) }}" method="POST">
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