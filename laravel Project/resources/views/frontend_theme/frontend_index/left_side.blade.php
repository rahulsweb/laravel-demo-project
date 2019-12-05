<div class="col-sm-3">
<div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian">
            <!--category-productsr-->
            @if(isset($categories))
            @foreach ($categories as  $category)
            
           @if(!$category->parent_id)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#{{ $category->name }}">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>    {{ $category->name }}
                        </a>
                    </h4>
                </div>

              
                <div id="{{ $category->name }}" class="panel-collapse collapse">
                     
                    

                  <div class="panel-body">

                        @if(count($category->child))
                          <ul>
                                @foreach ($category->child  as  $child)
                                @if(count($child->products))
                            <li ><a href="{{ url('categories/subcategory',$child->id) }}"> <strong class="text-warning"> {{ $child->name }}</strong>  </a></li>
                            
                            @endif  

                            @endforeach  
                        </ul>
                        @else
                        <ul>
                           
                            <li ><strong class="text-danger">Product Not Availible</strong> </li>
                            
                       
                        </ul>

                        @endif
                    </div>
         
               
                </div>
            </div>
         
            @endif
           
            @endforeach
            
          @endif
        </div>
        <!--/category-products-->

        <div class="brands_products">
            <!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    @if(isset($subCategory ))
                    @foreach ($subCategory as $value )
                    <li>
                            <a href="#"> <span class="pull-right">({{ $value->count }})</span>{{ $value->name }}</a>
                        </li> 
                    @endforeach
                        @endif
                  
                </ul>
            </div>
        </div>
        <!--/brands_products-->

    
        <!--/shipping-->

    </div>
</div>