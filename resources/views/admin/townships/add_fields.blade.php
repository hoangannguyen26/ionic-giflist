<div class="form-group required{{ $errors->has('township_id') ? ' has-error' : '' }}">
    <label for="township-township_id" class="col-sm-3 control-label">Mã quận</label>
    <div class="col-sm-7">
    @if (!empty($township->township_id))
        <input type="text" name="township_id" id="township-township_id" class="form-control" value="{{ $township->township_id }}" readonly="true">
    @else
        <input type="text" name="township_id" id="township-township_id" class="form-control">
    @endif
    </div>
    @if ($errors->has('township_id'))
        <span class="help-block">
            {{ $errors->first('township_id') }}
        </span>
    @endif
</div>
<div class="form-group required{{ $errors->has('township_name') ? ' has-error' : '' }}">
    <label for="township-township_name" class="col-sm-3 control-label">Tên Quận</label>
    <div class="col-sm-7">
    @if (!empty($township->township_name))
        <input type="text" name="township_name" id="township-township_name" class="form-control" value="{{ $township->township_name }}">
    @else
        <input type="text" name="township_name" id="township-township_name" class="form-control">
    @endif
    </div>
    @if ($errors->has('township_name'))
        <span class="help-block">
            {{ $errors->first('township_name') }}
        </span>
    @endif
</div>
<div class="form-group required{{ $errors->has('address') ? ' has-error' : '' }}">
    <label for="township-address" class="col-sm-3 control-label">Địa chỉ</label>
    <div class="col-sm-7">
    @if (!empty($township->address))
        <input type="text" name="address" id="township-address" class="form-control" value="{{ $township->address }}">
    @else
        <input type="text" name="address" id="township-address" class="form-control">
    @endif
    </div>
    @if ($errors->has('address'))
        <span class="help-block">
            {{ $errors->first('address') }}
        </span>
    @endif
</div>
<div class="form-group required{{ $errors->has('bank_info') ? ' has-error' : '' }}">
    <label for="township-bank_info" class="col-sm-3 control-label">Thông tin ngân hàng</label>
    <div class="col-sm-7">
        <textarea class="form-control" name= "bank_info" id="township-bank_info" rows="5">{{
           !empty($township->bank_info) ? $township->bank_info :''  
        }}</textarea>
    </div>
    @if ($errors->has('bank_info'))
        <span class="help-block">
            {{ $errors->first('bank_info') }}
        </span>
    @endif
</div>