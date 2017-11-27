<!-- resources/views/excel/index.blade.php -->
@extends('layouts.app')

@push('page-script')
	<link href="/bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <script src="/bootstrap-fileinput/js/fileinput.js"></script>
    <script src="/bootstrap-fileinput/js/fileinput_locale_vn.js"></script>

    <script>
    	$(function () {
		    $.ajaxSetup({
		        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() }
		    });
		});
    </script>

@endpush

@section('content')
<div class="update_zone">
	<form enctype="multipart/form-data" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<input id="data_excel" class="file" type="file" data-preview-file-type="xlsx" data-min-file-count="1" name="data_excel">
		</div>
	</form>
</div>

<script>
	$("#data_excel").fileinput({
	    language: 'vn',
	    uploadUrl: '/admin/upload',
	    overwriteInitial: false,
	    maxFileSize: 5 * 1024, // 3Mb
	    maxFilesNum: 1,
		allowedFileExtensions : ['xlsx']
	});
</script>
@endsection