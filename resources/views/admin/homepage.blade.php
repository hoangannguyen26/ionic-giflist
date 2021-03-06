<!-- resources/views/post/index.blade.php -->
@extends('layouts.app')

@push('page-script')
<!-- include summernote css/js-->
<link href="{{ URL::asset('summernote/summernote.css') }}" rel="stylesheet">
<script src="{{ URL::asset('summernote/summernote.js') }}"></script>
<script src="{{ URL::asset('summernote/lang/summernote-vi-VN.js') }}"></script>

<script>
    $(function(){
       $('textarea[name="content"]').summernote({
            width: 800,
            height: 400,
            lang: 'vi-VN'
        }); 
    });
</script>

@endpush

@section('content')
<!-- HTML here -->
	<!-- Form add new nhomdt -->
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-head-line">Sửa trang chủ</h4>
        </div>
    </div>
@if (!empty($homepage->id))
	<form action="{{ url('/admin/homepage/edit/'. $homepage->id) }}" id="homePageForm" method="POST" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
@else
    <form action="{{ url('/admin/homepage') }}" id="homePageForm" method="POST" class="form-horizontal" enctype="multipart/form-data">
@endif
        {{ csrf_field() }}
        <div class="form-group required{{ $errors->has('content') ? ' has-error' : '' }}">
            <div class="col-sm-6 col-sm-offset-2">
                <textarea class="form-control" name= "content" id="homepage-content">
                @if (!empty($homepage->content))
                    {{ $homepage->content }}
                @endif
                </textarea>
            </div>
            @if ($errors->has('content'))
                <span class="help-block">
                    {{ $errors->first('content') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i>Thay đổi
                </button>
            </div>
        </div>
    </form>
@endsection