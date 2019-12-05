<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($contactUs->name) ? $contactUs->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:note</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($contactUs->email) ? $contactUs->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:note</p>') !!}
</div>

<div class="form-group {{ $errors->has('contact') ? 'has-error' : ''}}">
    <label for="contact" class="control-label">{{ 'contact' }}</label>
    <input class="form-control" name="contact" type="text" id="contact" value="{{ isset($contactUs->contact) ? $contactUs->contact : ''}}" >
    {!! $errors->first('contact', '<p class="help-block">:note</p>') !!}
</div>
<div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
    <label for="subject" class="control-label">{{ 'Subject' }}</label>
    <input class="form-control" name="subject" type="text" id="subject" value="{{ isset($contactUs->subject) ? $contactUs->subject : ''}}" >
    {!! $errors->first('subject', '<p class="help-block">:note</p>') !!}
</div>
<div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
        <label for="message" class="control-label">{{ 'Message' }}</label>
        <textarea class="form-control" rows="5" name="message" type="textarea" id="message" >{{ isset($contactUs->message) ? $contactUs->message : ''}}</textarea>
        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
    </div>
<div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}">
    <label for="note" class="control-label">{{ 'note' }}</label>
    <textarea class="form-control" rows="5" name="note" type="textarea" id="note" >{{ isset($contactUs->note) ? $contactUs->note : ''}}</textarea>
    {!! $errors->first('note', '<p class="help-block">:note</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
