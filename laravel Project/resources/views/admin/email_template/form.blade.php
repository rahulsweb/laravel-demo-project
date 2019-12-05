<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input data-parsley-trigger="keyup" required  data-parsley-pattern="^[A-Za-z]*$" data-parsley-required-message="Name is required" class="form-control" name="name" type="text" id="name" value="{{ isset($email->name) ? $email->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
    <label for="subject" class="control-label">{{ 'Subject' }}</label>
    <input data-parsley-trigger="keyup" required  data-parsley-pattern="^[A-Za-z]*$" data-parsley-required-message="Subject is required" class="form-control" name="subject" type="text" id="subject" value="{{ isset($email->subject) ? $email->subject : ''}}" >
    {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
    
    <label for="message" class="control-label">{{ 'Message' }}</label>
     
            <textarea id="message" name="message" rows="10" cols="80"  required   value="{{ isset($email->message) ? $email->message : ''}}">
                {{ isset($email->message) ? $email->message : ''}}
            </textarea>
 {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
  </div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
