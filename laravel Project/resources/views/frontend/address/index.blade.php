 @extends('frontend_theme.frontend_layout') 
 @push('styles')



@endpush

@section('content')
    <div class="container">
        <div class="row">
        

            <div class="col-md-12 ">
                <div class="card">
                    <div class=""><h2 class="text-center text-default"> Address</h2></div>
                    <div class="card-body">
                        <a href="{{ url('address/create') }}" class="btn btn-success btn-md" title="Add New Address">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>


                        <br/>
                        <br/>
                      <div class="table-responsive">
                                
                                    <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Full Name</th><th>Address</th><th>Alternate Address</th> <th>Country</th><th>State</th><th>Pincode</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($address as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->fullname }}</td>
                                        <td>{{ $item->address1 }}</td>
                                        <td>{{ $item->address2 }}</td>
                                          <td>{{ $item->country }}</td>
                                            <td>{{ $item->state }}</td>
                                              <td>{{ $item->pincode }}</td>
                                        <td>
                                            <a href="{{ url('address/' . $item->id) }}" title="View Address"><button class=" btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('address/' . $item->id . '/edit') }}" title="Edit Address"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('address' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Address" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
@endsection
@push('scripts') 

<!-- jQuery 3 -->

<script>
  $(function () {
    $('#example2').DataTable();
   
  });
</script>

@endpush
