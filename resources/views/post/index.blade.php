@extends('layouts.app')

@push('page-script')

<link href="{{ URL::asset('css/post.css') }}" rel="stylesheet" type="text/css">

@endpush

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <h4 class="page-head-line">Tin tức và công văn</h4>
	    </div>
	</div>
@if (count($posts) > 0)
    <div id="posts-list">
        <ul>
        @foreach ($posts as $post)
            <li class="title_post new"><a href="{{ url('/post').'/'.$post->id }}">{{ $post->title }} ({{ $post->created_at }})</a></li>
        @endforeach
        </ul>
    </div>
@endif
@endsection