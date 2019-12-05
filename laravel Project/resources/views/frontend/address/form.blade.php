

<div class="form-group {{ $errors->has('fullname') ? 'has-error' : ''}}">
        <label for="fullname" class="control-label">{{ 'Full Name' }}</label>
        <input data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$"  data-parsley-required="true" data-parsley-message=" Enter Full Name Invalid" class="form-control" placeholder="Enter The Full Name" fullname="fullname" type="text" id="fullname"  name="fullname" value="{{ isset($address->fullname) ? $address->fullname : ''}}" >
        {!! $errors->first('fullname', '<p class="help-block">:message</p>') !!}
    </div>
    <div  class="form-group {{ $errors->has('address1') ? 'has-error' : ''}}">
            <label for="address1"  class="control-label">{{ 'Address' }}</label>
            <input class="form-control" data-parsley-trigger="keyup"   data-parsley-required="true" placeholder="Enter The Address" address1="address1" type="text" id="address1"  name="address1" value="{{ isset($address->address1) ? $address->address1 : ''}}" >
            {!! $errors->first('address1', '<p class="help-block">:message</p>') !!}
        </div>
    <div class="form-group {{ $errors->has('address2') ? 'has-error' : ''}}">
            <label for="address2" class="control-label">{{ 'Alternate Address' }}</label>
           <input  class="form-control" placeholder="Enter The Another Address" address2="address2" type="text" id="address2"  name="address2" value="{{ isset($address->address2) ? $address->address2 : ''}}" >
            {!! $errors->first('address2', '<p class="help-block">:message</p>') !!}
        </div>
<div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
    <label for="country" class="control-label">{{ 'Country' }}</label>
    <input data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-required="true" class="form-control" placeholder="Enter The Country" country="country" type="text" id="country"  name="country" value="{{ isset($address->country) ? $address->country : ''}}" >
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
    <label for="state" class="control-label">{{ 'State' }}</label>
    <input  data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-required="true" class="form-control" placeholder="Enter The State" state="state" type="text" id="state"  name="state" value="{{ isset($address->state) ? $address->state : ''}}" >
    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
</div>

    <div class="form-group {{ $errors->has('pincode') ? 'has-error' : ''}}">
            <label for="pincode" class="control-label">{{ 'Pincode' }}</label>
            <input  data-parsley-trigger="keyup" data-parsley-type="digits" data-parsley-length="[6,7]" data-parsley-required="true" class="form-control" placeholder="Enter The Pincode" pincode="pincode" type="text" id="pincode"  name="pincode" value="{{ isset($address->pincode) ? $address->pincode : ''}}" >
            {!! $errors->first('pincode', '<p class="help-block">:message</p>') !!}
        </div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
