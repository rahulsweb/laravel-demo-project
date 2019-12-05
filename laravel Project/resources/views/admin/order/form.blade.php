<div class="form-group">

        <li class="list-group-item" style="margin-top:30px;">
                <div class="col-md-3">
                <section class="orders" >
                
                       <h5  >Order Code :<b class=" pull-right">{{ $orders->order_code}}</h5> </b>
                     <h5>Payment Type: <b class=" pull-right">{{ $orders->orderPayment[0]->payment_type}}</b></h5>
                          <h5 >Payment status: <b class="  pull-right">{{ $orders->orderPayment[0]->status}}</b></h5>
                     <h5>Total Qty:<b class="  pull-right">{{ $orders->order_carts[0]->pivot->total_qty}}</b></h5>
                <h5>Total:<b class="  pull-right" >{{ "Rs ".$orders->order_carts[0]->pivot->total_cart}}</b></h5>
                  <div class="orders-card">
                
                    <div class="orders-image">
                
                    </div>
                    <div class="orders-info">
                
                    </div>
                  </div>
                
                  <!-- more orderss -->
                
                </section>
                </div>
                
                
                @foreach ($orders->order_carts as $items )
                
                
                <section class="orderss text-center" style="display:inline-block; margin-left:30px;">
                
                  <!-- It's likely you'll need to link the card somewhere. You could add a button in the info, link the titles, or even wrap the entire card in an <a href="..."> -->
                
                  <div class="orders-card">
                
                    <div class="orders-image">
                      <img src="{{ asset($items->pivot->images) }}" width="100" height="100">
                    </div>
                    <div class="orders-info">
                      <strong>{{ $items->name}}</strong>
                      <h6><b class="text-success">Rs {{ $items->rate}}</b></h6>
                    </div>
                  </div>
                
                  <!-- more orderss -->
                
                </section>
                
                
                @endforeach
                
                </li>
</div>
 <div class="form-group {{ $errors->has('roles') ? 'has-error' : ''}}">
      <strong>Payment Status</strong>
                  <select class="form-control" name="status">
                      
                        <option value="{{ $orders->orderPayment[0]->status }}">{{ isset($orders->orderPayment[0]->status) ? $orders->orderPayment[0]->status : 'Select Status' }}</option>
                      
                   
                     
                      <option value="Pending">Pending</option>
                      <option value="Processing">Processing</option>
                      <option value="Dispatch">Dispatch</option>
                      <option value="Shipping">Shipping</option>
                      <option value="Delivered">Delivered</option>
     
                    
                    
                  </select>
                 {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
                </div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
