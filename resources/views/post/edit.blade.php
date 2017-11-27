<!-- resources/views/post/index.blade.php -->
@extends('layouts.app')
@push('page-script')
<!-- include summernote css/js-->
<link href="{{ URL::asset('summernote/summernote.css') }}" rel="stylesheet">
<script src="{{ URL::asset('summernote/summernote.js') }}"></script>
<script src="{{ URL::asset('summernote/lang/summernote-vi-VN.js') }}"></script>

<script>
    $(document).ready(function() {
        $('textarea[name="content"]').summernote({
            height: 300,
            lang: 'vi-VN'
        });
        makeSelectAJAX(
            "{{ URL::asset('/user/api/townships') }}",
            "post-township_id", 
            "-- Chọn Quận --",
            "{{ $post->township_id }}"
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
	<form action="{{ url('/admin/post/'.$post->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        @include('post.add_fields')
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i>Sửa công văn
                </button>
            </div>
        </div>
    </form>
@endsection