@extends('layouts.app')

@push('page-script')

<link href="{{ URL::asset('css/post.css') }}" rel="stylesheet" type="text/css">

@endpush

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <h4 class="page-head-line">{!! $post->title !!}</h4>
	    </div>
	</div>
	<div class="post-content">
		{!! $post->content !!}	
	</div>
	<div class="post-attachment">
		@if(count($post->attachments) > 0)
			Công văn đính kèm:
			@foreach ($post->attachments as $attachment)
				<a href="{{ url('/uploads/').'/'.$attachment->path }}">{{ $attachment->path }}</a>
			@endforeach
		@endif
	</div>
@endsection