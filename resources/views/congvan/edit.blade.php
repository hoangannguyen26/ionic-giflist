<!-- resources/views/congvan/index.blade.php -->
@extends('layouts.app')
@push('page-script')
<!-- include summernote css/js-->
<link href="{{ URL::asset('summernote/summernote.css') }}" rel="stylesheet">
<script src="{{ URL::asset('summernote/summernote.js') }}"></script>
<script src="{{ URL::asset('summernote/lang/summernote-vi-VN.js') }}"></script>

<script>
    $(document).ready(function() {
        $('textarea[name="noi_dung_cv"]').summernote({
            height: 300,
            lang: 'vi-VN'
        });
        makeSelectAJAX(
            "{{ URL::asset('/user/api/phongbans') }}",
            "congvan-ma_phong_ban", 
            "-- Chọn bộ phận --",
            "{{ $congvan->ma_phong_ban }}"
        );
    });
</script>

@endpush

@section('content')
<!-- HTML here -->
	<!-- Form add new nhomdt -->
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-head-line">Công văn</h4>
        </div>
    </div>
	<form action="{{ url('/admin/congvan/'.$congvan->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        @include('congvan.add_fields')
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i>Sửa công văn
                </button>
            </div>
        </div>
    </form>
@endsection