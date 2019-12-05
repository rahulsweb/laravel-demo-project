@extends('frontend_theme.frontend_layout') 
@push('styles')

<style>
  .header
   {
       font-size: 20px;
       text-align: center !important;
   }
</style>

@endpush
@section('content')
<div class="container">
<center>
<h1 class="jumbotron"><strong> {{ $page->title }}</strong></h1>
  
{!! $page->content !!}


<center>
  
</div>
<div class="row" style="margin:30px;">
</div>  
@endsection
@push('scripts') 

<script>

</script>
@endpush