<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input data-parsley-trigger="keyup" required  data-parsley-pattern="^[A-Za-z ]*$" data-parsley-rangelength="[9,50]"          data-parsley-required-message="Name is required Field"           class="form-control" name="name" type="text" id="name" value="{{ isset($content->name) ? $content->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'title' }}</label>
    <input data-parsley-trigger="keyup" required   data-parsley-pattern="^[A-Za-z ]*$"  data-parsley-required-message="Title is required" class="form-control" name="title" type="text" id="title" value="{{ isset($content->title) ? $content->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
    <label for="slug" class="control-label">{{ 'slug' }}</label>
    <input class="form-control" data-parsley-trigger="keyup" required   data-parsley-pattern="^[A-Za-z-]*$" data-parsley-required-message="Slug is required" name="slug" type="text" id="slug" value="{{ isset($content->slug) ? $content->slug : ''}}" >
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    
    <label for="title" class="control-label">{{ 'content' }}</label>
     
            <textarea data-parsley-required-message="Content is required" id="content" name="content" rows="10" cols="80"  required   value="{{ isset($content->content) ? $content->content : ''}}">
                {{ isset($content->content) ? $content->content : ''}}
            </textarea>
 {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
  </div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
