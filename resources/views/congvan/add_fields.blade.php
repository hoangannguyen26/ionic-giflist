<div class="form-group required{{ $errors->has('ma_phong_ban') ? ' has-error' : '' }}">
    <label for="congvan-ma_phong_ban" class="col-sm-3 control-label">Công văn của bộ phận</label>
    <div class="col-sm-7">
        <div class="input-group">
        <select class="form-control" name ="ma_phong_ban" id="congvan-ma_phong_ban">
        </select>
        <span class="input-group-btn">
            <a href="{{ url('/admin/phongbans') }}" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm bộ phận</a>
        </span>
        </div>
    </div>
    @if ($errors->has('ma_phong_ban'))
        <span class="help-block">
            {{ $errors->first('ma_phong_ban') }}
        </span>
    @endif
</div>
<div class="form-group required{{ $errors->has('tieu_de_cv') ? ' has-error' : '' }}">
    <label for="congvan-tieu_de_cv" class="col-sm-3 control-label">Tiêu đề</label>
    <div class="col-sm-7">
    @if (!empty($congvan->tieu_de_cv))
        <input type="text" name="tieu_de_cv" id="congvan-tieu_de_cv" class="form-control" value="{{ $congvan->tieu_de_cv }}">
    @else
        <input type="text" name="tieu_de_cv" id="congvan-tieu_de_cv" class="form-control">
    @endif
    </div>
    @if ($errors->has('tieu_de_cv'))
        <span class="help-block">
            {{ $errors->first('tieu_de_cv') }}
        </span>
    @endif
</div>
<div class="form-group required{{ $errors->has('noi_dung_cv') ? ' has-error' : '' }}">
    <label for="congvan-noi_dung_cv" class="col-sm-3 control-label">Nội dung công văn</label>
    <div class="col-sm-7">
        <textarea class="form-control" name= "noi_dung_cv" id="congvan-noi_dung_cv">{{
           !empty($congvan->noi_dung_cv) ? $congvan->noi_dung_cv :''  
        }}</textarea>
    </div>
    @if ($errors->has('noi_dung_cv'))
        <span class="help-block">
            {{ $errors->first('noi_dung_cv') }}
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('chu_thich') ? ' has-error' : '' }}">
    <label for="congvan-chu_thich" class="col-sm-3 control-label">Chú thích</label>
    <div class="col-sm-7">
    @if (!empty($congvan->chu_thich))
        <input type="text" name="chu_thich" id="congvan-chu_thich" class="form-control" value="{{ $congvan->chu_thich }}">
    @else
        <input type="text" name="chu_thich" id="congvan-chu_thich" class="form-control">
    @endif
    </div>
    @if ($errors->has('chu_thich'))
        <span class="help-block">
            {{ $errors->first('chu_thich') }}
        </span>
    @endif
</div>

