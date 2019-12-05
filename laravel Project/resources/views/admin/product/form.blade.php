<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name"  data-parsley-pattern="^[a-zA-Z0-9 ]+$" data-parsley-trigger="keyup"  data-parsley-required-message="Product Name fill Properly"  data-parsley-required type="text" id="name" value="{{ isset($product->name) ? $product->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rate') ? 'has-error' : ''}}">
    <label for="rate" class="control-label">{{ 'rate' }}</label>
    <input class="form-control" data-parsley-type="digits"
    data-parsley-trigger="keyup"  data-parsley-required-message="Please Enter Digit Only"  data-parsley-required  name="rate" type="text" id="rate" value="{{ isset($product->rate) ? $product->rate : ''}}" >
    {!! $errors->first('rate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Color' }}</label>
    <input class="form-control" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"  data-parsley-required-message="Color Field Is required"  data-parsley-required name="color" type="text" id="color" value="{{ isset($product->product_attribute->color) ? $product->product_attribute->color : ''}}" >
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="text" id="quantity"  data-parsley-type="digits"
    data-parsley-trigger="keyup"  data-parsley-required-message="Please Enter Digit Only"  data-parsley-required   value="{{ isset($product->product_attribute->quantity) ? $product->product_attribute->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image[]" type="file" id="image" multiple=true value="{{ isset($product->product_image->name) ? $product->product_image->name : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    @if(isset($product->product_image))
    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">  
        <div class="row">
            		
   @foreach ( $product->product_image as $image )
   <div class="col-md-2" style="margin:20px;">
     
       <a href="{{ url('/image/delete',$image->id) }}">  <button type="button" class="close"  > ×</button>	</a>
   <img src="{{ asset($image->name) }}" width=100 height=50>    
          </div>
   @endforeach
 
</div>
    @endif

</div>
</div>
<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label> Category Name</label>

    <select class="form-control" name="category" id="category">
      <option id="select_category" value="{{ isset($product->categories[0]->parent->name) ? $product->categories[0]->parent->id : ''}}">{{ isset($product->categories[0]->parent->name) ? $product->categories[0]->parent->name : 'Select Category'}}</option>
      @foreach ($categories as $item )

  @if(!$item->parent_id)
     <option value="{{ $item->id }}">{{ $item->name }}</option>
     @endif

     @endforeach
    </select>
</div>

<div class="form-group">

        <label> Sub Category Name</label>
        <select class="form-control" name="subcategory" id="subcategory">
          <option id="select_subcategory" value="{{ isset($product->categories[0]->id) ? $product->categories[0]->id : ''}}">{{ isset($product->categories[0]->parent->name) ? $product->categories[0]->name : 'Select Sub Category'}}</option>
           @if(!isset($item->parent))
          @foreach ($categories as $item )
       
         <option value="{{ $item->id }}">{{ $item->name }}</option>
     
    
         @endforeach
             @endif
        </select>
    </div>


    <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">


        <label for="status" class="control-label">Status</label>
   
                     <div class="checkbox">
                       <strong class="text-success active">
       <input    name="status" type="radio" id="status" value="{{'Active'}}"   {{ isset($product->status) && $product->status=='Active'  ? 'checked' : '' }}   >
   
                        Active
                       </strong>
                     </div>
   
                     <div class="checkbox">
                       <strong class="text-danger">
   
       <input   name="status" type="radio" id="status" value="{{'InActive'}}"   {{ isset($product->status) && $product->status=='InActive'  ? 'checked' : '' }}   >
                   InActive
                       </strong>
                     </div>
   
                     
              
       {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
   </div>


<div class="form-group" >
    <input class="btn btn-primary" style="margin-top:20px;" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
