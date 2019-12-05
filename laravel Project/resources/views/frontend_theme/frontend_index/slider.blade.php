<section id="slider"><!--slider-->
  
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        @foreach ($banners as $key => $banner )
                            
                  
                        <div class="item {{ $key == 0 ? ' active' : '' }}">
                            <div class="container-fluid">
                         
                                <img  src="{{ asset('/images/'.$banner->image) }}" class="girl " alt="" width="100%"  height=500px;/>
                             
                            </div>
                        </div>
                     
                        @endforeach
                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>

</section><!--/slider-->

