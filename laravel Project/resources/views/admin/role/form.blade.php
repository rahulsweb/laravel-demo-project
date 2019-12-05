<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label text-danger">{{ 'name' }}</label>
    <input data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"  data-parsley-required-message="Product Name fill Properly"  data-parsley-required class="form-control " name="name" type="text" id="name" value="{{ isset($role->name) ? $role->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('permission') ? 'has-error' : ''}}">
    <label for="permission" class="control-label text-info">{{ 'Permissions' }}</label>



    {!! $errors->first('permission', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">


    @foreach($permissions as $value)
    @if(isset($rolePermissions))
        <label class="text-success">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
        {{ $value->name }}</label>
        @else
        <label class="text-success">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
            {{ $value->name }}</label>
            @endif
    <br/>
    @endforeach
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
