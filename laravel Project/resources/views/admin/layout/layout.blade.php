<!DOCTYPE html>

<html>
<head>
  @stack('styles')
  @stack('scripts')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

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