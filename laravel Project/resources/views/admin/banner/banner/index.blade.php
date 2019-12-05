@extends('admin_layout.layout')
@push('styles') 
<style>
   img.center {
   display: block;
   margin-left: auto;
   margin-right: auto;
   }
</style>
<!-- Google Font -->
@endpush 
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
                  <strong style="font-size:30px;" class="box-title text-success ">Banner Management</strong>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <a href="{{ url('/admin/banner/create') }}" class="btn btn-success btn-md" title="Add New AdminUser">
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
                              <th>#</th>
                              <th>Name</th>
                              <th>Image</th>
                              <th>Description</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($banner as $item)
                           <tr >
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->name }}</td>
                              <td><img class="img-responsive center img-fluid" src="{{ asset('/images/'.$item->image) }}" alt="NO images" border=3 height=40 width=40 style="image" ></td>
                              <td>{{ $item->description }}</td>
                              <td>
                                 <a href="{{ url('/admin/banner/' . $item->id) }}" title="View Banner"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                 <a href="{{ url('/admin/banner/' . $item->id . '/edit') }}" title="Edit Banner"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                 <form method="POST" action="{{ url('/admin/banner' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Banner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                 </form>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                     <div class="pagination-wrapper"> {!! $banner->appends(['search' => Request::get('search')])->render() !!} </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection