<div class="form-group required{{ $errors->has('ten_phong_ban') ? ' has-error' : '' }}">
    <label for="phongban-ten_phong_ban" class="col-sm-3 control-label">Tên bộ phận</label>
    <div class="col-sm-7">
    @if (!empty($phongban->ten_phong_ban))
        <input type="text" name="ten_phong_ban" id="phongban-ten_phong_ban" class="form-control" value="{{ $phongban->ten_phong_ban }}">
    @else
        <input type="text" name="ten_phong_ban" id="phongban-ten_phong_ban" class="form-control">
    @endif
    </div>
    @if ($errors->has('ten_phong_ban'))
        <span class="help-block">
            {{ $errors->first('ten_phong_ban') }}
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('chu_thich') ? ' has-error' : '' }}">
    <label for="phongban-chu_thich" class="col-sm-3 control-label">Chú thích</label>
    <div class="col-sm-7">
    @if (!empty($phongban->chu_thich))
        <input type="text" name="chu_thich" id="phongban-chu_thich" class="form-control" value="{{ $phongban->chu_thich }}">
    @else
        <input type="text" name="chu_thich" id="phongban-chu_thich" class="form-control">
    @endif
    </div>
    @if ($errors->has('chu_thich'))
        <span class="help-block">
            {{ $errors->first('chu_thich') }}
        </span>
    @endif
</div>