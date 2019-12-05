<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$"  data-parsley-required type="text" id="name" value="{{ isset($configuration->name) ? $configuration->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" data-parsley-trigger="keyup" data-parsley-type="email"   data-parsley-required name="email" type="text" id="email" value="{{ isset($configuration->email) ? $configuration->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">


        <label for="status" class="control-label">Status</label>
   
                     <div class="checkbox">
                       <strong class="text-success active">
       <input   checked  name="status" type="radio" id="status" value="{{'Active'}}"   {{ isset($configuration->status) && $configuration->status=='Active'  ? 'checked' : '' }}   >
   
                        Active
                       </strong>
                     </div>
   
                     <div class="checkbox">
                       <strong class="text-danger">
   
       <input   name="status" type="radio" id="status" value="{{'InActive'}}"   {{ isset($configuration->status) && $configuration->status=='InActive'  ? 'checked' : '' }}   >
                   InActive
                       </strong>
                     </div>
   
                     
              
       {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
   </div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
