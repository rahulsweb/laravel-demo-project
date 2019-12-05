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
                  <strong style="font-size:30px;" class="box-title text-success ">Category Managment</strong>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <a href="{{ url('/admin/category/create') }}" class="btn btn-success btn-md" title="Add New AdminUser">
                  <i class="fa fa-plus" aria-hidden="true"></i> Add New
                  </a>
                  <br/>
                  <br/>
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
                              <th>#</th>
                              <th>Name</th>
                              <th>Parent Category</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($category as $item)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td><strong class="text-info">{{ $item->name }}</strong></td>
                              <td><strong class="text-danger">{{ $item->parent['name'] ? $item->parent['name'] : 'N/A'  }}</strong></td>
                              <td>
                                 <a href="{{ url('/admin/category/' . $item->id) }}" title="View Category"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                 <a href="{{ url('/admin/category/' . $item->id . '/edit') }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                 <form method="POST" action="{{ url('/admin/category' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                 </form>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                     <div class="pagination-wrapper"> {!! $category->appends(['search' => Request::get('search')])->render() !!} </div>
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