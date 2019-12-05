@extends('admin_layout.layout')
@push('styles') 
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AdminLTE 2 | Starter</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="{{asset('/bootstrap/dist/css/bootstrap.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('/Ionicons/css/ionicons.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
   page. However, you can choose any other skin. Make sure you
   apply the skin class to the body tag so the changes take effect. -->
<link rel="stylesheet" href="{{asset('dist/css/skins/skin-blue.min.css')}}">
<link rel="stylesheet" href="{{asset('datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
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
      <h1 class="text-center "><b>
         Banner Detail
         </b>
      </h1>
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
                     <form method="POST" id="banner_form" action="{{ url('/admin/banner/' . $banner->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        @include ('admin/banner.banner.form', ['formMode' => 'edit'])
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection