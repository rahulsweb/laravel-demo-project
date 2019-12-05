
<!DOCTYPE html>

<html>
<head>
  <title>
    Admin Panel
  </title>
@include('admin_layout.style')
@stack('styles')
</head>

<body class="hold-transition login-page">
<div class="login-box">
        <div class="login-logo">
          <a href="#"><b>Admin </b>Login</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
                <div class="panel-body" id="msg">
                        @if (session('error'))
                            <div class="alert alert-danger">
                              <strong class="text-light  " >  {{   session('error') }}</strong>
                              {{ session()->forget('error') }}
                            </div>
                        @endif
    
                    </div>
          <p class="login-box-msg">Sign in to start your login</p>
          <form class="form-horizontal" method="POST" action="{{ route('login.custom') }}">
                {{ csrf_field() }}  
            <div class="form-group has-feedback">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row col-xs-offset-1">
              <div class="col-xs-6">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
      
          <!-- /.social-auth-links -->
      
     
      
        </div>
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    
    
    
    @include('admin_layout.script')
    <script>
            $(document).ready(function(){
               
                setTimeout(function() {
                    $('#msg').fadeOut('fast');
                }, 4000);
            });
        </script>
    </body>
    </html>