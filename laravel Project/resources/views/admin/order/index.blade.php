@extends('admin_layout.layout')



@push('scripts') 

<!-- jQuery 3 -->


<script>
  $(function () {
    $('#example2').DataTable();
   
  });
</script>

@endpush


@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 
  <!-- Main content -->
  <section class="content ">

 
                <div class="row">
          
        
                    <div class="col-md-12 ">
   
   
   <div class="box">
            <div class="box-header">
            <strong style="font-size:30px;" class="box-title text-success ">order Managment</strong>
            </div>
            <!-- /.box-header -->


                   <form method="GET" action="{{ url('/admin/order') }}" accept-charset="UTF-8" class="form-inline pull-right px-2 " role="search">
                            <div class="input-group" style="margin-right:10px;">
                              <li  style="list-style-type:none;">  <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </li>
                            </div>
                        </form>
          
            <div class="box-body">
            
         
            
  

                  

                              <br>
                              <br>
                              @if ($message = Session::get('flash_message'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong class="text-center">{{ $message }}</strong>
</div>
@endif


                                <div class="table-responsive">
                                
                                    <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="alert alert-info">
                                       <th>#</th> <th>Order Code</th><th>name</th><th>Status</th><th>Qty</th><th>Total</th><th>Date</th><th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                    @if(count($orders))
                                   
                                @foreach($orders as $item)
                                    <tr>
                                           <td>{{ $loop->iteration }}</td> 
                        
                                        <td> {{ $item->order_code }}</td>
                                        <td> {{ $item->users->first_name." ".$item->users->last_name }}</td>
                                        <td>  {{ $item->orderPayment[0]->status }}</td>
                                        <td>   {{ $item->order_carts[0]->pivot->total_qty }} </td>
                                        <td> {{ $item->order_carts[0]->pivot->total_cart }}</td>
                                               <td> {{ $item->log_order->last()->created_at }}</td>
                                         
                                        <td>
                                                <a href="{{ url('/admin/order/' . $item->id) }}" title="View Coupon"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <a href="{{ url('/admin/order/' . $item->id . '/edit') }}" title="Edit Coupon"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                    
                                              
                                     
                                            </td>
                                    </tr>
                                    
                                @endforeach
                                @else
                                <tr><td colspan=8><h3 class="text-danger text-center"><b>Order Not Found</h3><b><td><tr>

                                @endif
                                
                            
                            </tbody>
                            </table>
     
                                             @if(isset($orders))   <div class="pagination-wrapper"> {!! $orders->appends(['search' => Request::get('search')])->render() !!} </div>@endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    
    
    </section>
    </div>


@endsection

