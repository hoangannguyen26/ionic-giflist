<!-- resources/views/admin/phongbans/edit.blade.php -->
@extends('layouts.app')
@push('page-script')
<script>

</script>

@endpush

@section('content')
<!-- HTML here -->
	<!-- Form add new nhomdt -->
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-head-line">Sửa thông tin bộ phận</h4>
        </div>
    </div>
	<form action="{{ url('/admin/phongban/'.$phongban->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        @include('admin.phongban.add_fields')
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i>Sửa thông tin bộ phận
                </button>
            </div>
        </div>
    </form>
@endsection