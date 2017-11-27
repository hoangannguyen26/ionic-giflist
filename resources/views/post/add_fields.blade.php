<div class="form-group required{{ $errors->has('township_id') ? ' has-error' : '' }}">
    <label for="post-township_id" class="col-sm-3 control-label">Công văn của Quận</label>
    <div class="col-sm-7">
        <select class="form-control" name ="township_id" id="post-township_id">
        </select>
    </div>
    @if ($errors->has('township_id'))
        <span class="help-block">
            {{ $errors->first('township_id') }}
        </span>
    @endif
</div>
<div class="form-group required{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="post-title" class="col-sm-3 control-label">Tiêu đề</label>
    <div class="col-sm-7">
    @if (!empty($post->title))
        <input type="text" name="title" id="post-title" class="form-control" value="{{ $post->title }}">
    @else
        <input type="text" name="title" id="post-title" class="form-control">
    @endif
    </div>
    @if ($errors->has('title'))
        <span class="help-block">
            {{ $errors->first('title') }}
        </span>
    @endif
</div>
<div class="form-group required{{ $errors->has('content') ? ' has-error' : '' }}">
    <label for="post-content" class="col-sm-3 control-label">Nội dung công văn</label>
    <div class="col-sm-7">
        <textarea class="form-control" name= "content" id="post-content">{{
           !empty($post->content) ? $post->content :''  
        }}</textarea>
    </div>
    @if ($errors->has('content'))
        <span class="help-block">
            {{ $errors->first('content') }}
        </span>
    @endif
</div>
<div class="form-group">
    <label for="post-content" class="col-sm-3 control-label">Tài liệu đính kèm</label>
    <div class="col-sm-7">
        <input type="file" name="attachments[]" multiple="multiple">
    </div>
</div>

