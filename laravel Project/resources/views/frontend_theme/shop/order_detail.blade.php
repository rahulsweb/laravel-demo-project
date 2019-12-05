@extends('frontend_theme.frontend_layout') 
@push('styles')



@endpush

@section('content')
   <div class="container">
       <div class="row">
  



           <div class="col-md-12 ">
               <div class="card">
                  
                   <div class="card-body">
                 




<ul class="list-group">
@foreach ($orders as $key => $product )
<div class="row">
 
<?php $total=""; ?>
</div>
<li class="list-group-item" style="margin-top:30px;">
<div class="col-md-3">
<section class="products" >

       <h5  >Order Code :<b class="text-info pull-right">{{ $product->order_code}}</h5> </b>
     <h5>Payment Type: <b class="text-warning pull-right">{{ $product->orderPayment[0]->payment_type}}</b></h5>
          <h5 >Payment status: <b class="text-danger  pull-right">{{ $product->orderPayment[0]->status}}</b></h5>
     <h5>Date <b class="text-danger  pull-right" >{{$product->log_order->last()->created_at}}</b></h5>

  
     <h5>Total Qty:<b class=" text-info pull-right">{{ $product->order_carts[0]->pivot->total_qty }}</b></h5>
<h5>Total:<b class="text-danger  pull-right" >{{ "Rs ".$product->order_carts[0]->pivot->total_cart }}</b></h5>
  <div class="product-card">

    <div class="product-image">

    </div>
    <div class="product-info">

    </div>
  </div>

  <!-- more products -->

</section>
</div>


@foreach ($product->order_carts as $items )


<section class="products text-center" style="display:inline-block; margin-left:30px;">

  <!-- It's likely you'll need to link the card somewhere. You could add a button in the info, link the titles, or even wrap the entire card in an <a href="..."> -->

   <div class="product-card">
 <a href="{{ url('product/detail', $items->id) }}">
    <div class="product-image">
     <img src="{{ asset($items->pivot->images) }}" width="100" height="100">
    </div>
    <div class="product-info">
      <strong>{{ $items->name}}</strong>
      <h6><b class="text-success">Rs {{ $items->rate}}</b></h6>
    </div>
  </div>
</a>

  <!-- more products -->

</section>


@endforeach

</li>
@endforeach

</ul>

                 
    </div>       
                       
                               
                             
                     
                 

                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
@push('scripts') 

<!-- jQuery 3 -->

<script>
 $(function () {
   $('#example2').DataTable();
  
 });
</script>

@endpush
