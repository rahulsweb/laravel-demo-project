 @extends('frontend_theme.frontend_layout') 
 @push('styles')
<style>
.fa {
  font-size: 1.5em;
  line-height: 0.75em;
  vertical-align: -15%;
}

</style>
@endpush
 @section('content')
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="login-form">
                    <!--login form-->
                    @if ($message = Session::get('login'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong class="text-center">{{ $message }}</strong>
        {{ Session::forget('login') }}
</div>
@endif  
                    @if(Session::has('register'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('register') }}</p>
                    @endif
                
                    <h2>Login to your account</h2>
                  
                </div>
                <!--/login form-->
                <div class="panel-body" id="msg">
                        @if (session('error'))
                            <div class="alert alert-danger">
                              <strong class="text-light" >  {{ session('error')  }}</strong>
                              {{    session()->forget('error') }}
                            </div>
                        @endif
    
                    </div>
 
         
                <div class="signup-form">
               
                    
                    <form class="form-horizontal" id="login" method="POST" action="{{ url('login') }}">
                        <ul class="list-group">
                           <li class="list-group-item">
                           <a href="{{ url('login/github') }}" class="btn btn-lg" title="github login" ><i class="fa fa-github" aria-hidden="true"></i></a>
                           <a href="{{ url('auth/google') }}" class="btn btn-lg" ><i class="fa fa-google-plus" title="google login"></i></a></li>
                         </ul>
                            {{ csrf_field() }}







                                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                   
                                    <input class="form-control" data-parsley-trigger="keyup" data-parsley-type-message="Email is Invalid" data-parsley-required-message="Email field is required" data-parsley-required="true" name="email" placeholder="Email-Id" type="text" id="email" value="{{ isset($adminuser->email) ? $adminuser->email : ''}}" >
                                    {!! $errors->first('email', '<strong class="help-block">:message</strong>') !!}
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                   
                                    <input class="form-control" data-parsley-trigger="keyup"   data-parsley-required-message="Password field is required" data-parsley-required="true" name="password" type="password"  id="password" placeholder="Password" value="{{ isset($adminuser->password) ? $adminuser->password : ''}}" >
                                    {!! $errors->first('password', '<strong class="help-block">:message</strong>') !!}
                                </div>
                              


                                    <div class="form-group">
                                            <input class="btn-lg btn-success text-muted" style="background-color:orange;" type="submit" value="Login">
                                       
                                             <a class="btn btn-link" href="{{ url('email') }}">
                                    Forgot Your Password?
                                </a>
                                        </div>
                                       

                    </form>
                </div>
            </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->
@push('scripts') 


@endpush

@include('admin_layout.script')
<script>
        $(document).ready(function(){
            $('#login').parsley();
            setTimeout(function() {
                $('#msg').fadeOut('fast');
            }, 4000);
        });
    </script>

@endsection

