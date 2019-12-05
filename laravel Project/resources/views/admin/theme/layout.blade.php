<!DOCTYPE html>

<html>
<head>
  @stack('styles')

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('theme.header')
 @include('theme.left_aside')

 @section('content')
 @show
@include('theme.footer')
@include('theme.control_aside')

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


  @stack('scripts')

</body>
</html>