
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" data-parsley-trigger="keyup"  data-parsley-required-message="Title Field Is required"  data-parsley-required name="title" type="text" id="title" value="{{ isset($coupon->title) ? $coupon->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <label for="code" class="control-label">{{ 'code' }}</label>
    <input class="form-control" data-parsley-pattern="^[a-zA-Z0-9 ]+$" data-parsley-trigger="keyup"  data-parsley-required-message="Coupon Code Field Is required"  data-parsley-required name="code" type="text" id="code" value="{{ isset($coupon->code) ? $coupon->code : ''}}" >
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('qty') ? 'has-error' : ''}}">
        <label for="qty" class="control-label">{{ 'qty' }}</label>
        <input class="form-control" 
        

  
    data-parsley-type="digits"
        data-parsley-trigger="keyup"  data-parsley-required-message="Please Enter Digit Only"  data-parsley-required name="qty" type="number" id="qty" min="1" max="100" value="{{ isset($coupon->qty) ? $coupon->qty : ''}}" >
        {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
    </div>

<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
        <label for="discount" class="control-label">{{ 'discount' }}</label>
        <input class="form-control" 
  
        data-parsley-type="digits"
            data-parsley-trigger="keyup"  data-parsley-required-message="Discount Field Is required"  data-parsley-required name="discount" type="number" id="discount" min="5" max="50" value="{{ isset($coupon->discount) ? $coupon->discount : ''}}" >
        {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
    </div>

<div class="form-group">

        <label> Coupon Type</label>
        <select class="form-control" name="type" id="type">
          @if(! isset($coupon->type))
        <option value="">Select Type</option>
        <option value="percentage">Percentage</option>
        <option value="amount">Amount</option>
          @endif
          @if(isset($coupon->type) && $coupon->type=='amount' )
          <option value="{{ $coupon->type }}">{{ $coupon->type }}</option>
          <option value="percentage">Percentage</option>
             @endif
             @if(isset($coupon->type) && $coupon->type=='percentage' )
             <option value="{{ $coupon->type }}">{{ $coupon->type }}</option>
             <option value="amount">Amount</option>
                @endif
        </select>
    </div>



    <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">


            <label for="status" class="control-label">Status</label>
       
                         <div class="checkbox">
                           <strong class="text-success active">
           <input    name="status" type="radio" id="status" value="{{'Active'}}"   {{ isset($coupon->status) && $coupon->status=='Active'  ? 'checked' : '' }}   >
       
                            Active
                           </strong>
                         </div>
       
                         <div class="checkbox">
                           <strong class="text-danger">
       
           <input   name="status" type="radio" id="status" value="{{'InActive'}}"   {{ isset($coupon->status) && $coupon->status=='InActive'  ? 'checked' : '' }}   >
                       InActive
                           </strong>
                         </div>
       
                         
                  
           {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
       </div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
