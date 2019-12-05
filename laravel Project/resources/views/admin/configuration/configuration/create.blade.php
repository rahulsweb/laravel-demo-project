@extends('admin_layout.layout')

@push('styles') 

<style>
.text-large
{
  font-size: 2em;
  text-align:center !important;
}
</style>

@endpush 
       
@push('scripts')  
<script>
   $(document).ready(function(){
     $('#conf_form').parsley();
     setTimeout(function() {
         $('#message').fadeOut('fast');
     }, 4000);
 });
</script>

@endpush


@section('content')
















@if ($message = Session::get('flash_message'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <strong class="text-success text-large">
   Create Configuration
     
    </strong>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content ">

        <div class="container">
                <div class="row">
          
        
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ url('admin/configuration') }}" title="Back"><button class="btn btn-warning btn-md"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                <br />
                                <br />
        
                                @if($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <form method="POST" id="conf_form" action="{{ url('/admin/configuration') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
        
                                    @include ('admin.configuration.configuration.form', ['formMode' => 'create'])
                        </form>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



                       

@endsection

                        

                       
     