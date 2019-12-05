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
            <strong style="font-size:30px;" class="box-title text-success ">Product Managment</strong>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
         
            
                                <a href="{{ url('/admin/product/create') }}" class="btn btn-success btn-md" title="Add New AdminUser">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
  
                        <br/>
                        <br/>
                        @if ($message = Session::get('flash_message'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr class="alert alert-info">
                                        <th>#</th><th>Name</th><th>Rate</th><th>Images</th><th>Color</th><th>Quantity</th> <th>Quantity Left</th><th>Category name</th><th>Status</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @if(count($product))                                  
                                        @foreach($product as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong class="text-success">{{ $item->name }}</strong></td>
                                            <td>{{ $item->rate }}</td>
                                            <td>
                                                
                                                @foreach ($item->product_image as $image)
                                                                                            
                                                @endforeach    
                                            
                                             @if(isset($image->name))
                                                <img src="{{ asset( $image->name) }}" width=150 height=100> 
                                                @else
                                                <img src="{{ asset('Product Image/not.png') }}" alt="Image not Avalible" width=150 height=100> 
                                                @endif 
                                            </td>
                                      
                                     <td> {{ $item->product_attribute->color }}</td>
                                     <td>{{ $item->product_attribute->quantity }}</td>
                                  
                                     <td>{{ $item->qty_left }}</td>
                                         
      @if(isset($item->categories[0]->name))
                                    <td>
                                     <strong class="text-success"> 
                                      {{$item->categories[0]->name}}
                                   </strong>
                                      </td> 
                                        @else
                                      <td>
                                                                            <strong class="text-danger"> N/A </strong>

                                      </td>  
                                 @endif
                                 <td>{{ $item->status }}</td>         
                                     <td>
                                                <a href="{{ url('/admin/product/' . $item->id) }}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <a href="{{ url('/admin/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        @role('admin')
                                                <form method="POST" action="{{ url('/admin/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                                @endrole
                                            </td>
                                        </tr>
                                    @endforeach
                               @endif
                                </tbody>
                            </table>
                            {{--  <div class="pagination-wrapper"> {!! $category->appends(['search' => Request::get('search')])->render() !!} </div>  --}}
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
