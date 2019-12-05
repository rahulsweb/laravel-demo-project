<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">Create Category {{ 'Name' }}</label>
    <input class="form-control" data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-required-message="Category Field Is required"  data-parsley-required name="name" placeholder="Category Name" type="text" id="name" value="{{ isset($category->name) ? $category->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <label> Category Name</label>
    <select class="form-control" name="parent_id">
      <option value="{{ isset($category->parent->id) ? $category->parent->id : 0 }}">{{ isset($category->parent->id) ? $category->parent->name : 'Select Category' }}</option>
  
     @foreach ($categories as $item )
  @if(!$item->parent)
     <option value="{{ $item->id }}">{{ $item->name }}</option>
     @endif

     @endforeach
    </select>
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div> 
