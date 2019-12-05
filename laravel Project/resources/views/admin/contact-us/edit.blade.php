@extends('admin_layout.layout')

@section('content')
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="text-center alert alert-info">
   Contact Us Edit
    </h1>
  
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

        <div class="container">
                <div class="row">
            
        
                    <div class="col-md-9">
                        <div class="card">
                          
                            <div class="card-body">
                                <a href="{{ url('/admin/contact-us') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                <br />
                                <br />
        
                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
        


                        <form method="POST" action="{{ url('/admin/contact-us/' . $contactUs->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.contact-us.form', ['formMode' => 'edit'])

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
