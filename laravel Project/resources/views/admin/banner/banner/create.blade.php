@extends('admin_layout.layout')




@push('styles') 


    <style>
            .text-large
            {
              font-size: 2em;
              text-align:center !important;
            }
            </style>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
@endpush 
       


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
        $(document).ready(function(){
          $('#banner_form').parsley();
          setTimeout(function() {
              $('#message').fadeOut('fast');
          }, 4000);
      });
     </script>

@endpush



@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
       
        <!-- Content Header (Page header) -->
  <section class="content-header">
    <strong class=" text-large">
   Create Banner
     
    </strong>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>
  </section>
      
  <section class="content ">

        <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
          
                    <div class="card-body">
                        <a href="{{ url('/admin/banner') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" id="banner_form" action="{{ url('/admin/banner') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.banner.banner.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

    </section>

    </div>
@endsection


