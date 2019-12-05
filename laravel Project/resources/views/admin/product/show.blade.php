@extends('admin_layout.layout')

@section('content')

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


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 
  <section class="content-header">
      <h1 class="text-center alert alert-default">
     Product Detail
      </h1>
    
    </section>
  <!-- Main content -->
  <section class="content container-fluid">

        <!-- /.content-wrapper -->

       
            <div class="row">
       
    
                <div class="col-md-12 ">
                <div class="card">
                  
                    <div class="card-body ">

                        <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                     
                        <br/>
                        <br/>

                        <div class="table-responsive list-group-item">
                            <table id="example2" class="table table-bordered table-hover">
                                <tbody>
                                   
                                    <tr><th class="  "> Name </th><td class="" > {{ $product->name }} </td></tr>
                                    <tr><th class=" "> Rate </th><td class=""> {{ $product->rate }} </td></tr>
                                    <tr><th class="  "> image </th>
                                        @foreach ($product->product_image as $image )
                                        <td > <img src= " {{ asset($image->name) }}" width=50 heigth=50 ></td> 
                                        @endforeach
                                      
                                      
                                    </tr>

                   
                                     @foreach ($product->categories as $products )
                                  @endforeach
                                                                      <tr><th class="  "> Category Name </th><td class=""> {{ $products->name }} </td></tr>

                              <tr><th class="  "> Quantity </th><td class=""> {{ $product->product_attribute->quantity }} </td></tr>
                                    <tr><th class="  "> Color </th><td class=""> {{ $product->product_attribute->color }} </td></tr>
                                </tbody>
                            </table>
                        </div>
    
               
                                       
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</div>

@endsection
