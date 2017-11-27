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
            height: 300,
            lang: 'vi-VN'
        }); 
        makeSelectAJAX(
            "{{ URL::asset('/user/api/townships') }}",
            "post-township_id", 
            "-- Chọn Quận --",
            ""
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
	<form action="{{ url('/admin/post') }}" id="addPostForm" method="POST" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}
            @include('post.add_fields')
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i>Thêm công văn
                </button>
            </div>
        </div>
    </form>
	@if (count($posts) > 0)
		<div class="panel panel-default">
            <div class="panel-heading">
                Danh sách công văn
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">

                    <!-- Table Headings -->
                    <thead>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Hình ảnh</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $post->title }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $post->content }}</div>
                                </td>
                                <td class="table-text">
                                    
                                    <div>{{ $post->content }}</div>
                                </td>
                                <td>
                                    <div>
                                        <a class="btn btn-primary" href="{{ url('/admin/post/edit/'.$post->id) }}"><i class="fa fa-edit"></i> Sửa</a>
                                    </div>
                                </td>
                                    <td>
                                    <form action="{{ url('/admin/post/'.$post->id) }}" method="POST">
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