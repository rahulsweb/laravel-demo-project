 @extends('frontend_theme.frontend_layout') 
 @push('styles')



@endpush

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="card">
         
                    <div class="card-body">

                       
                        <br/>
                        <br/>

                        <div class="table-responsive list-group-item">
                            <table class="table">
                                <tbody>
                              
                                    <tr><th> Name </th><td> {{ $address->fullname }} </td></tr>
                                    <tr><th> Address </th><td> {{ $address->address1 }} </td></tr>
                                    <tr><th> State </th><td> {{ $address->state }} </td></tr>
                                    <tr><th> Country </th><td> {{ $address->country }} </td></tr>
                                    <tr><th>Pincode </th><td> {{ $address->pincode }} </td></tr>
                                   
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
