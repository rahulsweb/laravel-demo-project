<div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        @foreach ($products as $product)
            
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                            @foreach ($product->product_image as $image)
                      
                        @endforeach
                        <img src="{{ asset($image->name) }}"   class="img-fluid"  alt=""    height="200" />      

                        <h2>${{ $product->rate }}</h2>
                        <p><strong class="text-info">{{ $product->name }}</strong></p>
                    
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>${{ $product->rate }}</h2>
                            <p>{{ $product->name }}</p>
                            <a href="{{ url('cart/detail',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
    
        @endforeach

    </div>
