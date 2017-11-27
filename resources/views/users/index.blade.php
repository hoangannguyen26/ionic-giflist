@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-head-line">Thông tin cá nhân</h4>
        </div>
    </div>
    <div class="row">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Tên</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group required{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address" class="col-md-4 control-label">Địa chỉ</label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">

                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-md-4 control-label">Số điện thoại</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">

                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                <label for="contact" class="col-md-4 control-label">Người liên hệ</label>

                <div class="col-md-6">
                    <input id="contact" type="text" class="form-control" name="contact" value="{{ Auth::user()->contact }}">

                    @if ($errors->has('contact'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-edit"></i>Cập nhật
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
