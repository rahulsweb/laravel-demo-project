@extends('admin_layout.layout')



@push('styles') 

@endpush
@push('scripts') 

<script src="{{asset('jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
@endpush


@section('content')





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
        <h1 class="text-center alert alert-default">
         order Detail
        </h1>
      
      </section>

  <!-- Main content -->
  <section class="content container-fluid">

        <!-- /.content-wrapper -->
 <div class="container">
       <div class="row">
  



           <div class="col-md-12 ">
               <div class="card">
                  
                   <div class="card-body">
                 





<ul class="list-group">

<div class="row">


</div>







     <div class="table-responsive list-group-item">
                            <table class="table">
                                <tbody>
                               
                                    @if(isset($orders))
                                    <tr><th class=" "> Customer Order Name </th><td class=""><strong class=""> {{ $orders->billing_address->fullname }} </strong></td></tr>

                                     <tr><th class=" "> Customer Email </th><td class=""><strong class=""> {{$orders->users->email  }} </strong></td></tr>
                                     <tr><th class=" "> Customer Billing Address </th><td class=""><strong class="">  {{$orders->billing_address->address1  }} </strong></td></tr>
                                     <tr><th class=" "> Customer Shipping Address </th><td class=""><strong class=""> {{$orders->shipping_address->address1  }}</strong></td></tr>

                                                                          <tr><th class=" "> Order Code </th><td class=""><strong class=""> {{$orders->order_code  }} </strong></td></tr>
                                                                          <tr><th class=" "> Order Payment Type </th><td class=""><strong class=""> {{ $orders->orderPayment[0]->payment_type  }} </strong></td></tr>
                                                                          <tr><th class=" "> Order status </th><td class=""><strong class=""> {{ $orders->orderPayment[0]->status }} </strong></td></tr>
                                                                     <tr><th class=" "> Order Place Date </th><td class=""><strong class=""> {{ $orders->log_order->last()->created_at }} </strong></td></tr>
 
 
  


                                                                     <tr><th class=" "> Total Price </th><td class=""><strong class=""> {{ $orders->order_carts[0]->pivot->total_cart }} </strong></td></tr>
                                                                     <tr><th class=" "> Total  Orders </th><td class=""><strong class=""> {{ $orders->order_carts[0]->pivot->total_qty }} </strong></td></tr>
                               
                              
                                </tbody>
                              
                            </table>
                       <div class="row jumbotron">
                      <strong>Order Products</strong>
                       </div>  
                  
@foreach ($orders->order_carts as $items )

<strong>Item {{ $loop->iteration }}</strong>
<div class="row box">
<div class="col-md-6">
  <ul class="list-group">
      <li class="list-group-item">Product Name<strong class="pull-right">{{ $items->name }}</strong></li>
      <li class="list-group-item">Product Price<strong class="pull-right">{{ $items->rate }}</strong></li>
      <li class="list-group-item">Product Qty<strong class="pull-right">{{ $items->pivot->qty }}</strong></li>

  </ul>
</div>
<div class="col-md-6">
    <section class="orderss text-center" style="display:inline-block; margin-left:30px;">

      
        <div class="orders-card">
      
          <div class="orders-image">
            <img src="{{ asset($items->pivot->images) }}" width="100" height="100" style="margin:20px;">
          </div>
        
        </div>
      

      
      </section>
</div>
</div>
@endforeach

                        </div>
                      

                        @endif


















                 
       <div class="row">
     
       </div>         
                       
                               
                             
                     
                 

                   </div>
               </div>
           </div>
       </div>
   </div>
</section>
<!-- /.content -->
</div>


@endsection



