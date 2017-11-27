@extends('layouts.app')
@push('page-script')
<script>
    $(function () {
        $("#changePwdForm").validate({
            rules:
            {
                old_password: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 6,
                },
                password_confirmation: {
                    required: true,
                    minlength: 6,
                    equalTo: '[name="password"]'
                }
            },
            messages:
            {
                old_password:{
                    required: "Nhập mật khẩu cũ",
                },
                password: {
                    required: "Nhập mật khẩu mới",
                    minlength: "Mật khẩu phải {0} kí tự",
                },
                password_confirmation: {
                    required: "Nhập lại mật khẩu",
                    minlength: "Mật khẩu phải {0} kí tự",
                    equalTo: 'Mật khẩu không trùng'
                }
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
        <h4 class="page-head-line">Đổi mật khẩu</h4>
    </div>
</div>
<div class="row">
    @if (Session::get('message'))
    <div class="col-md-12">
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    </div>
    @endif
</div>
<div class="row">
    <form id="changePwdForm" class="form-horizontal" role="form" method="POST" action="{{ url('/profile/password') }}">
        {{ csrf_field() }}

        <div class="form-group required{{ $errors->has('old_password') ? ' has-error' : '' }}">
            <label for="old_password" class="col-md-4 control-label">Mật khẩu cũ</label>

            <div class="col-md-6">
                <input type="password" class="form-control" name="old_password">

                @if ($errors->has('old_password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('old_password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group required{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Mật khẩu mới</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group required{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-4 control-label">Xác thực lại mật khẩu mới</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-refresh"></i> Đổi mật khẩu
                </button>
            </div>
        </div>
    </form>
</div>
@endsection