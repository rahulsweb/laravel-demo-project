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
  <section class="content" >

 
                <div class="row">
          
        
                    <div class="col-md-12 ">
   
   
   <div class="box">
            <div class="box-header">
            <strong style="font-size:30px;" class="box-title text-success ">Customer Register Reports</strong>
            </div>
          


             <form method="GET" action="{{ url('/admin/customers') }}" accept-charset="UTF-8" class="form-inline pull-right px-2 " role="search">
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
		<a href="{{ url('customer/xls', [app('request')->input('search'),app('request')->input('page') ]) }}"><button class="btn btn-success">Download Excel xls</button></a>
		{{--  <a href="{{ url('customer/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>  --}}
		<a href="{{ url('customer/csv',app('request')->input('search')) }}"><button class="btn btn-success">Download CSV</button></a>
		<br><br>
	</div>
@endif



@if(app('request')->input('page') && !app('request')->input('search'))
   <div class="container">
            
    <a href="{{ url('customers/xls',[app('request')->input('page') ]) }}"><button class="btn btn-success">Download Excel xls</button></a>
    {{--  <a href="{{ url('customer/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>  --}}
    <a href="{{ url('customers/csv',[app('request')->input('page') ]) }}"><button class="btn btn-success">Download CSV</button></a>
    <br><br>
</div>
@endif

@if(app('request')->input('search') && !app('request')->input('page'))
   <div class="container">
            
    <a href="{{ url('customer/xls',app('request')->input('search')) }}"><button class="btn btn-success">Download Excel xls</button></a>
    {{--  <a href="{{ url('customer/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>  --}}
    <a href="{{ url('customer/csv',app('request')->input('search')) }}"><button class="btn btn-success">Download CSV</button></a>
    <br><br>
</div>
@endif


@if(!app('request')->input('search') && !app('request')->input('page'))
<div class="container">
            
		<a href="{{ url('customer/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
		{{--  <a href="{{ url('customer/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>  --}}
		<a href="{{ url('customer/csv') }}"><button class="btn btn-success">Download CSV</button></a>
		<br><br>
	</div>

    @endif






                                <div class="table-responsive">
                                
                                    <table  class="table table-bordered table-hover">
                                <thead>
                                    <tr class="alert alert-info">
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Email</th>    
                                      <th>Date</th><th>Order Details</th>    </tr>
                                   @foreach ($users as $user )
                                       <tr>
                                         <td>{{ $loop->iteration }}</td>                       

                                         <td>{{ $user->first_name." ".$user->last_name  }}</td>  
                                          <td>{{ $user->email  }}</td>                      
                                                      
                                          <td>{{ $user->created_at  }}</td>   
                                                                                            <td>         <a href="{{ url('admin/order/search',$user->email) }}" title="View Order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View Orders</button></a></td>  

                                                        
                                       </tr>
                                   @endforeach
                                   
                                
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
                                                                            <div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    
    
    </section>
    </div>


@endsection

