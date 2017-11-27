@extends('layouts.app')
@push('page-script')
<script>
    $(function () {
        $("#loginForm").validate({
            rules:
            {
                username: {
                    required: true,
                },
                password: {
                    required: true,
                },
            },
            messages:
            {
                username:{
                    required: "Nhập username",
                },
                password: {
                    required: "Nhập mật khẩu",
                },
            },
            showErrors: function (errorMap, errorList) {
                $.each(this.successList, function (index, value) {
                    return $(value).popover("hide");
                });
                return $.each(errorList, function (index, value) {
                var _popover;
                console.log(value.message);
                _popover = $(value.element).popover({
                    trigger: "manual",
                    placement: "top",
                    content: value.message,
                    template: "<div class=\"popover\"><div class=\"arrow\"></div><div class=\"popover-inner\"><div class=\"popover-content\"><p></p></div></div></div>"
                    });
                    _popover.data("bs.popover").options.content = value.message;
                    return $(value.element).popover("show");
                });
            },
            submitHandler: function(form){
                form.submit();
            }
        });
    });
</script>


@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="page-head-line">Đăng nhập</h2>
    </div>
</div>
<form id="loginForm" class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <label for="username" class="col-md-4 control-label">Username</label>
    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
        <div class="col-md-6">
            <input id="username" type="text" class="form-control" name="username">
        </div>
        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
    <label for="password" class="col-md-4 control-label">Mật khẩu</label>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password">
        </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Ghi nhớ
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-sign-in"></i> Đăng nhập
            </button>

            <a class="btn btn-link" href="{{ url('/password/reset') }}">Quên mật khẩu?</a>
        </div>
    </div>
</form>
@endsection
