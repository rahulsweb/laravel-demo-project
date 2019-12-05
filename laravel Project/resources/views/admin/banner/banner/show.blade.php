@extends('admin_layout.layout')
@push('styles') 
<style>
</style>
@endpush 
@push('scripts') 
<script src="{{asset('jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>


<script src="{{asset('datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
@endpush
@section('content')
<div class="content-wrapper  ">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1 class="text-center alert alert-default">
         Banner Detail
      </h1>
   </section>
   <!-- Main content -->
   <section class="content container-fluid">
      <!-- /.content-wrapper -->
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <a href="{{ url('/admin/banner') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                     <br/>
                     <br/>
                     <div class="table-responsive list-group-item">
                        <table class="table">
                           <tbody>
                              <tr>
                                 <th class=" "> Name </th>
                                 <td class=""><strong class=""> {{ $banner->name }} </strong></td>
                              </tr>
                              <tr>
                                 <th class=" "> Image </th>
                                 <td class=""><img src= "{{ asset('/images/'.$banner->image) }}" > </td>
                              </tr>
                              <tr>
                                 <th class="  "> Description </th>
                                 <td class=""> {{ $banner->description }} </td>
                              </tr>
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