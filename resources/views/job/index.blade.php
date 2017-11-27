@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-head-line">Việc làm thêm VP</h4>
        </div>
    </div>
@if (!empty($job))
    <div>
        {!!$job->content!!}
    </div>
@endif
@endsection
