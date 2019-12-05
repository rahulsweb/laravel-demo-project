 @extends('frontend_theme.frontend_layout') 
 @push('styles')



@endpush

@section('content')
    <div class="container">
        <div class="row">
           

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit Address #{{ $address->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('address') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" id="address_form" action="{{ url('address/' . $address->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('frontend.address.form', ['formMode' => 'edit'])

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