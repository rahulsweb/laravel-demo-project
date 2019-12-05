@extends('admin_layout.layout')



@push('scripts') 

<!-- jQuery 3 -->

<script src="{{asset('jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
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
            <strong style="font-size:30px;" class="box-title text-success ">Coupons Reports</strong>
            </div>
          


             <form method="GET" action="{{ url('/admin/coupons') }}" accept-charset="UTF-8" class="form-inline pull-right px-2 " role="search">
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






@if(app('request')->input('search') && app('request')->input('page'))
<div class="container">      
		<a href="{{ url('coupons/xls', [app('request')->input('search'),app('request')->input('page') ]) }}"><button class="btn btn-success">Download Excel xls</button></a>
		{{--  <a href="{{ url('coupons/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>  --}}
		<a href="{{ url('coupons/csv',app('request')->input('search')) }}"><button class="btn btn-success">Download CSV</button></a>
		<br><br>
	</div>
@endif



@if(app('request')->input('page') && !app('request')->input('search'))
   <div class="container">
            
    <a href="{{ url('coupon/xls',[app('request')->input('page') ]) }}"><button class="btn btn-success">Download Excel xls</button></a>
    {{--  <a href="{{ url('coupons/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>  --}}
    <a href="{{ url('coupon/csv',app('request')->input('page')) }}"><button class="btn btn-success">Download CSV</button></a>
    <br><br>
</div>
@endif

@if(app('request')->input('search') && !app('request')->input('page'))
   <div class="container">
            
    <a href="{{ url('coupons/xls',app('request')->input('search')) }}"><button class="btn btn-success">Download Excel xls</button></a>
    {{--  <a href="{{ url('coupons/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>  --}}
    <a href="{{ url('coupons/csv',app('request')->input('search')) }}"><button class="btn btn-success">Download CSV</button></a>
    <br><br>
</div>
@endif


@if(!app('request')->input('search') && !app('request')->input('page'))
<div class="container">
            
		<a href="{{ url('coupons/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
		{{--  <a href="{{ url('coupons/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>  --}}
		<a href="{{ url('coupons/csv') }}"><button class="btn btn-success">Download CSV</button></a>
		<br><br>
	</div>

    @endif




                                <div class="table-responsive">
                                
                                    <table  class="table table-bordered table-hover">
                                <thead>
                                    <tr class="alert alert-info">
                               
                                        <th>#</th><th>Code</th> <th>Discount</th><th>Type</th><th>Name</th><th>Order Details</th>
                                    </tr>
                                
                                    @foreach ($orders  as $order )
                                    
                                 @if($order->coupons)
                                    <tr>
                                 
                              
                                           <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->coupons->code }}</td>
                                            <td>{{ $order->coupons->discount }}</td>
                                            <td>{{ $order->coupons->type }}</td>
                                           <td>{{ $order->users->first_name." ".$order->users->last_name }}</td>
                                      
                                           <td>         <a href="{{ url('admin/order/search',$order->order_code) }}" title="View Order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View Orders</button></a></td>  

                                        </tr>
                                  
                                    @endif
                                   @endforeach
                              
                              
                              <?php /*
                                   <tr>
                                        <td>{{ $loop->iteration }}</td>                       

                                            <td> {{ $order->order_code }}</td>
                                       <td> {{ $order->users->first_name." ".$order->users->last_name }}</td>
                                       <td>  {{ $order->orderPayment[0]->status }}</td>
                                       <td>   {{ $order->order_carts[0]->pivot->total_qty }} </td>
                                       <td> {{ $order->order_carts[0]->pivot->total_cart }}</td>
      <td> {{ $order->log_order->last()->created_at }}</td>
 <td>         <a href="{{ url('admin/order/search',$order->order_code) }}" title="View Order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View Orders</button></a></td>  




*/
?>

 
                                  
                                  
                                   
                              
                              
                               
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
                                                                            <div class="pagination-wrapper"> {!! $orders->appends(['search' => Request::get('search')])->render() !!} </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    
    
    </section>
    </div>


@endsection

