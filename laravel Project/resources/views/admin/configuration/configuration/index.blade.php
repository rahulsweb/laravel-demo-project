


@extends('admin_layout.layout')



@push('scripts') 


<!-- jQuery 3 -->

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
            <strong style="font-size:30px;" class="box-title text-success ">Configuration Managment</strong>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
         
            
                                <a href="{{ url('admin/configuration/create') }}" class="btn btn-success btn-md" title="Add New Configuration">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
  
                  

                              <br>
                              <br>
                           
    @if ($message = Session::get('flash_message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong class="text-center">{{ $message }}</strong>
    </div>
    @endif
                                <div class="table-responsive">
                                
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="alert alert-info">
                                                <th>#</th><th> Name</th><th>Email</th><th>Status</th><th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
@foreach($configuration as $item)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $item->name }}</td><td>{{ $item->email }}</td>
    <td>{{ $item->status }}</td>
    <td>
        <a href="{{ url('/admin/configuration/' . $item->id) }}" title="View Configuration"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
        <a href="{{ url('/admin/configuration/' . $item->id . '/edit') }}" title="Edit Configuration"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

        <form method="POST" action="{{ url('/admin/configuration' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete Configuration" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </form>
    </td>
</tr>
@endforeach
                                               
                                  
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
<!-- /.content-wrapper -->









    
@endsection





