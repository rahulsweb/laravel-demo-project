<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label for="name" class="control-label">{{ 'Name' }}</label>
        <input class="form-control"  data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$"  data-parsley-required  name="name" type="text" id="name" value="{{ isset($banner->name) ? $banner->name : ''}}" >
        {!! $errors->first('name', '
        <p class="help-block">:message</p>
        ') !!}
     </div>
     @if (isset($banner->image))
     <input type="hidden" id="b_image" name="b_image"   value="{{ isset($banner->image) ? $banner->image : ''}}" >
     @endif					
     <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
        <label for="image" class="control-label">{{ 'Image' }}</label>
        <input class="form-control" name="image" type="file" id="image"  value="{{ isset($banner->image) ? $banner->image : ''}}" >
        {!! $errors->first('image', '
        <p class="help-block">:message</p>
        ') !!}
     </div>
     <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
        <label for="description" class="control-label">{{ 'Description' }}</label>
        <input class="form-control" name="description" type="text" id="description" data-parsley-trigger="keyup"   data-parsley-required value="{{ isset($banner->description) ? $banner->description : ''}}" >
        {!! $errors->first('description', '
        <p class="help-block">:message</p>
        ') !!}
     </div>
     <div class="form-group">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
     </div>
   