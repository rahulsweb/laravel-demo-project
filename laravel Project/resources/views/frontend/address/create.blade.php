 @extends('frontend_theme.frontend_layout') 
 @push('styles')



@endpush

@section('content')
    <div class="container">
        <div class="row">
       

            <div class="col-md-8 col-md-offset-2">
                <div class="card">
              <div class=""><h2 class="text-center text-default"> Create Address</h2></div>
                    <div class="card-body">
                        <a href="{{ url('address') }}" title="Back"><button class="btn btn-danger btn-md"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

             

                        <form method="POST" id="address_form" action="{{ url('address') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('frontend.address.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts') 
<script>
        $(document).ready(function(){
            $('#address_form').parsley();
            setTimeout(function() {
                $('#message').fadeOut('fast');
            }, 4000);
        });
</script>

@endpush