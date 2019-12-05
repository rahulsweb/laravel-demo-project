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
     Coupon Detail
    </h1>
  
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

        <!-- /.content-wrapper -->

        <div class="container">
            <div class="row">
       
    
                <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/coupon') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                     
                        <br/>
                        <br/>

                        <div class="table-responsive list-group-item">
                                
                            <table id="example2" class="table table-bordered table-hover">
                                <tbody>
                                 
                                    <tr><th class="  "> Title </th><td class=""> {{ $coupon->title }} </td></tr>
                                    <tr><th class="  "> Code </th><td class=""> {{ $coupon->code }} </td></tr>
                                    <tr><th class="  "> Type </th><td class=""> {{ $coupon->type }} </td></tr>
                                    <tr><th class="  "> Discount </th><td class=""> {{ $coupon->discount }} </td></tr>
                                    <tr><th class="  "> Qty </th><td class=""> {{ $coupon->qty }} </td></tr>
                                    <tr><th class="  "> Qty Left </th><td class=""> {{ $coupon->qty_left }} </td></tr>
                                    <tr><th class="  "> Status</th><td class=""> {{ $coupon->status }} </td></tr>
                                </tbody>
                            </table>
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
