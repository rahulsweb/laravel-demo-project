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
         Role Detail
        </h1>
      
      </section>

  <!-- Main content -->
  <section class="content container-fluid">

        <!-- /.content-wrapper -->

        <div class="box">
            <div class="row">
       
    
                <div class="col-md-12">
                <div class="card">

                    <div class="card-body">

                        <a href="{{ url('/admin/role') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       
                        <br/>
                        <br/>

                        <div class="table-responsive list-group-item">
                                
                            <table id="example2" class="table table-bordered ">
                                <tbody>
                                   
                                    <tr><th class="text-muted"> Title </th><td> <strong class="">{{ $role->name }} </strong></td></tr>
                                    <tr><th class=""> Permissions </th>
                                        
                                    @foreach ($role->permissions as $permission )
                                    <td colspan="2" class="" >  <strong class="text-success">{{ $permission->name }} </strong> </td>
                                    @endforeach
                                    <td></td>
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
