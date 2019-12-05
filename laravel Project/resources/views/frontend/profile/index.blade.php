 @extends('frontend_theme.frontend_layout') 
 @push('styles')


 <link href="{{ asset('css/frontendProfile.css') }}" rel="stylesheet">

@endpush

@section('content')
    <div class="container">
        <div class="row">
        

            <div class="col-md-12 ">
                            
<div class="container emp-profile">
<form method="post">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                   @if(isset($users->profile)) 
                <img src="{{ asset($users->profile) }}" alt="No iMGES"/>
                @else
                <img src="{{ asset('User/no_image.jpeg') }}" alt="No iMGES"/>
                @endif
                <div class="file btn btn-lg btn-primary">
                          <strong>  {{ ucfirst($users->first_name)." "  }}  {{ ucfirst($users->last_name)  }}</strong>
                    <input type="file" name="file"/>
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
            <a href="{{ url('profile/'.$users->id. '/edit') }}"  class="profile-edit-btn btn btn-lg">Edit Profile</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
           
        </div>
        <div class="col-md-8">  
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="active" id="home" role="tabpanel" aria-labelledby="home-tab">
                       
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $users->first_name." "  }}  {{ $users->last_name  }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $users->email}}</p>
                                </div>
                            </div>
                       
                          
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

<!-- jQuery 3 -->

<script>
  $(function () {
    $('#example2').DataTable();
   
  });
</script>

@endpush
