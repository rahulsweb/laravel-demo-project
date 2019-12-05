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



<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>



        @if ($message = Session::get('message'))
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong class="text-center">{{ $message }}</strong>
        </div>
        @endif
        <div class="table-responsive cart_info">

  
                <table class="table table-condensed">
         






















                    @if(isset(auth()->user()->wishlists))
                    <?php $countWishlist=count(auth()->user()->wishlists); ?>
                    @else
                    <?php $countWishlist=count(auth()->user()->wishlists); ?>
                    @endif

                        


        
                        @if($countWishlist)
                                      
                        
                    <thead>
                            <tr class="cart_menu">
                                    <td class="image">name</td>
                                    <td class="description">Price</td>
                                <td class="image">image</td>
                                <td class="image"></td>
                                <td class="image"></td>
                  
                              
                               
                            </tr>
                        </thead>
                        <tbody>

                        @foreach(auth()->user()->wishlists as $key => $product)
                
                        @if(count($product))

                          
                       
                    <tr>
                        
                       <td><strong>{{ $product->name }}</strong></td>
                        <td><strong>{{ $product->rate }}</strong></td>
                        <td> <a href="{{ url('product/detail', $product->id) }}"><img src="{{ asset($product_image->where('product_id',$product->id)->first()->name) }}" width=100 height=100 ></a></td>      
                        <td>    
                             @if(isset(Session::get('cart')->items))                
                            <?php $check=count(Session::get('cart')->items); ?>
                            @else
                            <?php $check=0; ?>
                            @endif



                              
                                <a href="{{ url('cart/detail',$product->id) }}" class="btn btn-default add-to-cart"  ><i class="fa fa-plus-square"></i>Add To Cart</a>
                                    
                            
                       
                            
                        </td>
                        <td>
                         
                               <a class="btn btn-warning add-to-cart" href="{{ url('wishlist/delete', $product->id) }}"  >  Delete  </a>                        </td>
                    </tr>
                        @endif
                    @endforeach   
                   @else
                 <tr>
                    <td class="text-danger" colspan="5"> <strong><h1 class="text-center">WishList Is Empty</strong></td>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->



@endsection

@push('scripts') 

<script>

</script>
@endpush