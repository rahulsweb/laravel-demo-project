<!DOCTYPE html>

<html>
<head>
//add css in module name of @stack('styles') of the content include css in head section
  @stack('styles')
  //add scripts in module name of @stack('scripts') of the content include in head section
  @stack('scripts')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
//add header section on admin panel
  @include('layout.header')
 @include('layout.left_aside')

 @section('content')
 @show


@include('layout.footer')
@include('layout.control_aside')

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



@stack('footer_scripts')

</body>
</html>