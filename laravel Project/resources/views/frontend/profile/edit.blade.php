 @extends('frontend_theme.frontend_layout') 
 @push('styles')

 <link href="{{ asset('css/frontendProfile.css') }}" rel="stylesheet">


@endpush

@section('content')
    <div class="container">
        <div class="row">
           


                 
                <div class="col-md-12 ">
                                  <form method="POST" id="profile_form" action="{{ url('profile/'.$users->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                           
                        <div class="container emp-profile">
                       
                            <div class="row">
                                <div class="col-md-4">
                              
                                    <div class="profile-img">
                                            @if(isset($users->profile)) 
                                            <img src="{{ asset($users->profile) }}" alt="No iMGES"/>
                                            @else
                                            <img src="{{ asset('User/no_image.jpeg') }}" alt="No iMGES"/>
                                            @endif
                                        <div class="file btn btn-lg btn-primary">
                                            Change Photo
                                            <input type="file" name="profile"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="profile-head">
                                             
                                            <h3 class="text-info"><b>
                                                    {{ ucfirst($users->first_name)." "  }}  {{ ucfirst($users->last_name)  }}
                                                 </b> </h3>
                                                <h6>
                                                    Web Developer and Designer
                                                </h6>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                </div>
                         
                                <div class="col-md-2">
                                        <a href="{{ url('profile') }}"  class="profile-edit-btn btn btn-lg">Profile</a>
                                    </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                   
                                </div>
                                <div class="col-md-8">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class=" active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                   

                

                            @include ('frontend.profile.form', ['formMode' => 'edit'])

                   

                                        </div>
                                 
                                    </div>
                                </div>
                            </div>
                        </form>           
                        </div>
                                    </div>













                 
        </div>
    </div>
@endsection
@push('scripts') 
<script>
        $(document).ready(function(){
            $('#profile_form').parsley();
            setTimeout(function() {
                $('#message').fadeOut('fast');
            }, 4000);
        });
</script>

@endpush