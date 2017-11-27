@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
<!--         <div class="col-md-5 col-md-offset-0">
            <div class="panel panel-info">
                <div class="panel-heading">Số lượt view</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">Trong tháng:</li>
                        <li class="list-group-item">Tổng lượt view từ đầu:</li>
                  </ul>
                </div>
            </div>
        </div> -->
        <div class="col-md-5 col-md-offset-6">
            <div class="panel panel-info">
                <div class="panel-heading">Số lượt view</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">Trong tháng {{date("m-Y")}}: {{ $view_in_month}}</li>
                        <li class="list-group-item">Tổng lượt view từ đầu: {{ $total_view}}</li>
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection