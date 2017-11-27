
<div class="form-group required{{ $errors->has('content') ? ' has-error' : '' }}">
    <label for="job-content" class="col-sm-3 control-label">Nội dung công văn</label>
    <div class="col-sm-7">
        <textarea class="form-control" name= "content" id="job-content">{{
           !empty($job->content) ? $job->content :''  
        }}</textarea>
    </div>
    @if ($errors->has('content'))
        <span class="help-block">
            {{ $errors->first('content') }}
        </span>
    @endif


