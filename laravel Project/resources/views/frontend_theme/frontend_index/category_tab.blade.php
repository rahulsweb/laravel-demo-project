
 
<div class="category-tab">
        <!--category-tab-->
        <div class="col-sm-12" >
            <ul class="nav nav-tabs">
                @foreach ($subCategory as $key => $value )
                <li class="{{ $key == 0 ? ' active' : '' }}"><a href="#{{$value->name}}" class="category_tab" data-toggle="tab"  name="{{ $value->id }}">{{ $value->name }}</a></li>
              @endforeach
                
              
               
            </ul>
        </div>
       
        <div class="tab-content">
                @foreach ($subCategory as $key => $value )
       
            <div class="tab-pane fade  {{ $key == 0 ? ' active' : '' }}  in" id="{{$value->name}}">
                
         <div class="row col-sm-12" id="sub_categories">
                   <div class="p">
            @foreach ($subCategoryProduct as $products)
       
      
                    <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img id="image" src="{{ asset( $products->product_image[0]->name) }}" alt=""  class="img-fluid"  alt=""   height="150" />
                                        <strong>{{ $products->name }}</strong>
                                        <h2 id="rate">{{ $products->rate }}</h2>
                                        <p></p>
                                  
                                      
                                         
                                         <a href="{{ url('cart/detail',$products->id) }}"  class="btn btn-default add-to-cart" ><i class="fa fa-plus-square"></i>Add To Cart</a>
                                     
                                     
                                        
                                    </div>
                                </div>
                                <?php 
    
                                    ?>
                            </div>
                    
                            
                        </div>
                
         
                  
            @endforeach
        </div>
        <div class="new_p">
            </div>
            </div>
            
            </div>
       @endforeach
   
        </div>

    </div>





  