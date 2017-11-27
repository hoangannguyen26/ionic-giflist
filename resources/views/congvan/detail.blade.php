@extends('layouts.app')

@push('page-script')

<link href="{{ URL::asset('css/post.css') }}" rel="stylesheet" type="text/css">

@endpush

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <h4 class="page-head-line">{!! $congvan->tieu_de_cv !!}</h4>
	    </div>
	</div>
	<div class="post-content">
		{!! $congvan->noi_dung_cv !!}	
	</div>
@endsection