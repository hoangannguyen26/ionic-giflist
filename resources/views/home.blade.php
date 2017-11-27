@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-head-line">Trang chủ</h4>
        </div>
    </div>
@if (!empty($homepage))
    <div>
        {!!$homepage->content!!}
    </div>
@endif
@endsection
