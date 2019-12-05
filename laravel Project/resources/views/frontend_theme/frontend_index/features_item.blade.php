


<div class="row">
     
</div>


<div class="features_items">


  
    <!--features_items-->
        <h2 class="title text-center">Features Items</h2>
    @if(count($products) < 1 )     
    <h2 align="center" class="text-danger"><b>Product Not Found</b></h2>
    @endif

        @foreach ($products as $key => $product)
 
       
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
               
                            @foreach ($product->product_image as $image)
                      
                        @endforeach
                        <img src="{{ asset($image->name) }}"   class="img-fluid"  alt=""   height="200" />      

                        <h2>${{ $product->rate }}</h2>
                        <p><strong class="text-info">{{ $product->name }}</strong></p>
                        
                  
          
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>${{ $product->rate }}</h2>
                            <p>{{ $product->name }}</p>
                            <a id="add_to_cart" href="{{ url('cart/detail',$product->id) }}" class="btn btn-default add-to-cart"  ><i class="fa fa-plus-square"></i>Add To Cart</a>

                        </div>
                    </div>
                </div>
     
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                    
                        @if(isset(auth()->user()->id))
                        <li>
                            
                                <form action="{{ url('wishlist/add') }}" method="POST">
                                        {{ csrf_field() }}
                                    <input type="hidden" name="wish" value="{{ $product->id }}" >
                            <button type="submit"   id="wishlist"><i class="fa fa-plus-square" ></i>Add to wishlist</button>
                                    
                        </form></li>
                        @else
                        <li>
                            
                     
                            <button type="submit"  onclick="return false"  id="wishlist"><i class="fa fa-plus-square" ></i>Add to wishlist</button>
                                    
                    
                        @endif
                        
                      
                        <li><a href="{{ url('product/detail', $product->id) }}"  ><i class="fa fa-plus-square"></i>Product Details</a></li>
                                        
                    </ul>
                </div>
        
            </div>
        </div>
    
        @endforeach
        {{ $products->links() }}
    </div>
   