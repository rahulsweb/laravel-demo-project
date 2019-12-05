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
            <strong style="font-size:30px;" class="box-title text-default ">Content Management System</strong>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
         
            
                                <a href="{{ url('/admin/cms/create') }}" class="btn btn-success btn-md" title="Add New email">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
  

                                {{--  <form method="GET" action="{{ url('/admin/cms') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                  
                                    </div>
                                          <span class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                </form>  --}}
                  

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
                                                <th>#</th><th> Name</th><th>title</th><th>slug<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                           
                                            @if(isset($content))
                                        @foreach($content as $item)
                                          
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong class="text-success">{{ ucfirst($item->name) }}</strong></td>
                                           

                                             <td>                                            
                                                    {{ $item->title }}
                                               
                                                </td>
                                                          <td>                                            
                                                    {{ $item->slug }}
                                               
                                                </td>

                                               @role('admin')
                                                <td>
                                                   
                                                    <a href="{{ url('/admin/cms/' . $item->id) }}" title="View email"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                    <a href="{{ url('/admin/cms/' . $item->id . '/edit') }}" title="Edit email"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                             @can('user-edit')
                                                    <form method="POST" action="{{ url('/admin/cms' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete email" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                    </form>
                                                    @endcan
                                                </td>
                                   
                                                @endrole
                                            </tr> 
                                    
                                        @endforeach
                                        @endif
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
